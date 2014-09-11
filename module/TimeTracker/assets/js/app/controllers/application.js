App.ApplicationController = Ember.Controller.extend({
    withLayout: true,
    year: moment().year(),
    actions: {
        error: function (error) {
            Ember.Logger.error(error);
            this.transitionTo('error');
        }
    }
});

App.LoadingController = Ember.Controller.extend({
    randProg: 0,
    randNum: Ember.computed('randProg', function() {
        this.set('randProg', this.get('randProg' + 1))
        return Math.floor(Math.random() * 49 + 50);
    })
});
