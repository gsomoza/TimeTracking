App.User = DS.Model.extend({
    username: DS.attr('string'),
    password: DS.attr('string'),
    firstName: DS.attr('string'),
    lastName: DS.attr('string'),
    dayLength: DS.attr('number'),
    worklogs: DS.hasMany('worklog', {async:true})
});

App.User.FIXTURES = [
    {
        username: 'gabriel',
        password: 'pentium',
        hoursPerDay: 8,
        worklogs: [1,2,3]
    }
];
