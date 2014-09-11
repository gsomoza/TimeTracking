App.LoginRoute = Ember.Route.extend({
    setupController: function(controller, model) {
        controller.set('errorMessage', null);
    },
    actions: {
        sessionAuthenticationFailed: function(error) {
            var message = error.detail;
            this.controller.set('errorMessage', {
                heading: (error.status == 401 ? 'Invalid Credentials' : 'Error'),
                message: message
            });
        }.on('sessionAuthenticationFailed')
    }
});

App.RegisterRoute = Ember.Route.extend({
    setupController: function(controller, model) {
        controller.set('errorMessage', null);
    },
    actions: {
        sessionAuthenticationFailed: function(error) {
            var message = JSON.parse(error).detail;
            this.controller.set('errorMessage', {heading:'Error', message: message});
        }
    }
});

App.UsersRoute = Ember.Route.extend(SimpleAuth.AuthenticatedRouteMixin, {
    model: function () {
        return this.store.find('user');
    }
});

App.UserRoute = Ember.Route.extend(SimpleAuth.AuthenticatedRouteMixin, {
    model: function () {
        return this.store.find('user', this.get('session.account_id'));
    },
    serialize: function (model, params) {
        return { username: model.get('username') };
    },
    setupController: function (controller, model) {
        this._super(controller, model);
        this.controller.set('model', model);
    }
});
