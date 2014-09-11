App.FourOhFourRoute = Ember.Route.extend({
    renderTemplate: function(error) {
        this.render('error');
    }
});
