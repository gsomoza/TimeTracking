App.WorklogSerializer = App.BaseSerializer.extend({
    extractArray: function(store, primaryType, payload) {
        var worklogs = payload._embedded.worklog;
        payload = { worklogs: worklogs };
        return this._super(store, primaryType, payload);
    },

    extractSingle: function(store, type, payload, id) {
        var worklog = payload._embedded.worklog;
        if(!worklog && payload.id) {
            worklog = {
                id: payload.id,
                duration: payload.duration,
                notes: payload.notes,
                date: payload.date
            };
            delete payload.id;
            delete payload.duration;
            delete payload.notes;
            delete payload.date;
        }
        payload = { worklog: worklog };
        return this._super(store, type, payload, id);
    }
});
