App.Router.reopen({
    rootURL: '/'
});

App.Router.map(function() {
    this.route('login', {path: '/'});
    this.route('register');

    this.resource('worklogs');
    this.resource('worklog', {path: '/worklog/:worklog_id'});
    this.resource('report');

    this.resource('users');
    this.resource('user',  {path: '/user/:username'});

    this.route('fourOhFour', {path: '*path'});
});

App.ApplicationRoute = Ember.Route.extend(SimpleAuth.ApplicationRouteMixin, {
    actions: {
        error: function (reason, transition) {
            var error = JSON.parse(reason.responseText);
            if(error.status == 403) {
                return this.get('session').invalidate();
            } else {
                return this.transitionTo('error');
            }
        }
    }
});
