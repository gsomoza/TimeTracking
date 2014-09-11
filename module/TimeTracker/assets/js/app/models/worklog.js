App.Worklog = DS.Model.extend({
    user: DS.belongsTo('user', {async: true}),
    duration: DS.attr('number'),
    notes: DS.attr('string'),
    date: DS.attr('doctrineDate'),
    dateInput: function(key, date) {
        var dd = new App.DoctrineDateTransform();
        if(arguments.length > 1) { // set
            this.set('date', dd.deserialize(date));
        }
        // get
        return dd.serialize(this.get('date'), 'YYYY-MM-DD');
    }.property('date')
});

App.Worklog.FIXTURES = [
    {
        id: 'gabriel',
        date: {date:'2014-08-23T00:00:00+02:00'},
        duration: 1.5,
        notes: 'TEST1',
        user: 1
    },
    {
        id: 'gabriel',
        date: {date:'2014-08-23T00:00:00+02:00'},
        duration: 7,
        notes: 'TEST2',
        user: 1
    },
    {
        id: 'gabriel',
        date: {date:'2014-08-23T00:00:00+02:00'},
        duration: 10,
        notes: 'TEST3',
        user: 1
    }
];
