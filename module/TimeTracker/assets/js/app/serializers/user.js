App.UserSerializer = App.BaseSerializer.extend({
    primaryKey: 'username',

    extractSingle: function(store, primaryType, payload, id) {
        var newPayload = {user:{}};
        newPayload.user._links    = payload._links;
        if(!Ember.empty(payload.password))
            newPayload.user.password  = payload.password;
        newPayload.user.username  = payload.username;
        newPayload.user.dayLength = payload.dayLength;
        newPayload.user.firstName = payload.firstName;
        newPayload.user.lastName  = payload.lastName;
        newPayload.worklogs       = payload.worklog;
        return this._super(store, primaryType, newPayload, id);
    },

    serialize: function (post, options) {
        var json = this._super(post, options);
        if(Ember.empty(json.password)) {
            delete json.password;
        }
        return json;
    }
});
