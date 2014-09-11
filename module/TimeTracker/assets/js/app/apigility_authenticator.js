// the custom session that handles an authenticated account
App.CustomSession = SimpleAuth.Session.extend({
    account: function() {
        var accountId = this.get('account_id');
        if (!Ember.isEmpty(accountId)) {
            return this.container.lookup('store:main').find('user', accountId);
        }
    }.property('account_id')
});

// the custom authenticator that handles the authenticated account
App.ApigilityAuthenticator = SimpleAuth.Authenticators.OAuth2.extend({
    authenticate: function(credentials) {
        var _this = this;
        return new Ember.RSVP.Promise(function(resolve, reject) {
            // make the request to authenticate the user at endpoint /oauth
            Ember.$.ajax({
                url:  _this.serverTokenEndpoint,
                type: 'POST',
                data: { grant_type: 'password', username: credentials.identification, password: credentials.password, client_id: window.ENV['simple-auth-oauth2'].clientId },
                dataType: 'json',
                contentType: 'application/x-www-form-urlencoded'
            }).then(function(response) {
                Ember.run(function() {
                    // resolve (including the account id) as the AJAX request was successful; all properties this promise resolves
                    // with will be available through the session
                    resolve({ access_token: response.access_token, account_id: credentials.identification });
                });
            }, function(xhr, status, error) {
                Ember.run(function() {
                    reject(xhr.responseJSON || xhr.responseText);
                });
            });
        });
    }
});

// the custom authorizer that authorizes requests against the custom server
App.CustomAuthorizer = SimpleAuth.Authorizers.Base.extend({
    authorize: function(jqXHR, requestOptions) {
        var accessToken = this.get('session.access_token');
        if (this.get('session.isAuthenticated') && !Ember.isEmpty(accessToken)) {
            jqXHR.setRequestHeader('Authorization', 'Bearer ' + accessToken);
        }
    }
});
