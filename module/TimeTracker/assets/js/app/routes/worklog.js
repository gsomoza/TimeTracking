App.WorklogsRoute = Ember.Route.extend(SimpleAuth.AuthenticatedRouteMixin, {
    queryParams: {
        dateStart: {
            refreshModel: true
        },
        dateEnd: {
            refreshModel: true
        }
    },

    model: function(params) {
        var dateStart = moment(params.dateStart) || moment(),
            dateEnd = moment(params.dateEnd) || moment(),
            userId = params.userId,
            query;
        dateStart = dateStart.subtract(1, 'days').endOf('day');
        dateEnd = dateEnd.endOf('day');
        query = {
            'query': [{
                'field': 'date',
                'where': 'and',
                'type':  'between',
                'from':   dateStart.format(App.dateFormats.mysql),
                'to':     dateEnd.format(App.dateFormats.mysql)
            }, {
                'field': 'user',
                'type' : 'eq',
                'value': this.get('session.account_id')
            }]
        };
        return this.store.filter('worklog', query, function(worklog){
            var date = moment(worklog.get('date'));
            return date.isValid() &&
                    (date.isAfter(dateStart) || date.isSame(dateStart)) &&
                    (date.isBefore(dateEnd) || date.isSame(dateEnd));
        });
    }
});

App.WorklogsLoadingRoute = Ember.Route.extend({
    // show nothing!
});
