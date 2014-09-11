App.ReportView = Ember.View.extend({
    didInsertElement: function() {
        window.print();
    }
});
App.ReportController = Ember.ArrayController.extend({
    withLayout: false
});
