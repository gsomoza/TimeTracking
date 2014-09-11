App.LoginController = Ember.Controller.extend(SimpleAuth.LoginControllerMixin, {
    authenticator: 'authenticator:apigility',
    isWaiting: false,
    actions: {
        authenticate: function () {
            var _this = this;
            this.set('isWaiting', true);
            return this._super().then(function(){
                Bootstrap.NM.push("Logged in successfully! We're taking you to your Worklogs.", 'success');
            }).finally(function () {
                _this.set('isWaiting', false);
            });
        },
        register: function () {
            this.transitionTo('register');
        },

        // display an error when logging in fails
        sessionAuthenticationFailed: function(message) {
            this.set('errorMessage', message);
        },

        // handle login success
        sessionAuthenticationSucceeded: function() {
            this.set('errorMessage', "");
            this.set('identification', "");
            this.set('password', "");
            this._super();
        }
    }
});

App.RegisterController = Ember.Controller.extend({
    isWaiting: false,
    actions: {
        register: function () {
            var _this = this, user;
            this.set('isWaiting', true);
            user = this.store.createRecord('user', {
                username: this.get('registerUsername'),
                password: this.get('registerPassword')
            });
            user.save().then(function() {
                Bootstrap.NM.push('User created successfully! Please login to continue.', 'success');
                _this.transitionToRoute('login');
            }, function(reason) {
                _this.set('errorMessage', {message: reason.statusText});
            }).finally(function() {
                _this.set('isWaiting', false);
            });
        },

        login: function () {
            this.transitionToRoute('login');
        }
    }
});

App.UsersController = Ember.ArrayController.extend({});

App.UserController = Ember.Controller.extend({
    validations: {
        newPassword: {
            length: {minimum: 4},
            confirmation: true
        },
        dayLength: {
            numericality: {onlyInteger: true, greaterThan: 0, lessThan: 24}
        }
    },
    actions: {
        submit: function () {
            var user = this.model;
            user.transitionTo('updated.uncommitted')
            user.set('username', user.get('id'));
            user.save().then(function(){
                Bootstrap.NM.push('Account successfully updated.', 'success');
            });
        }
    }
});

