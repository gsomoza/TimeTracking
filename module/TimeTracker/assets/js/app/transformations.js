App.DoctrineDateTransform = DS.Transform.extend({
    dateFormat: 'YYYY-MM-DD HH:mm:ss',
    serialize: function (value, format) {
        var outputFormat = typeof format == 'string' ? format : this.dateFormat;
            date = moment.isMoment(value) ? value : date = moment(value);
        return date.format(outputFormat);
    },
    deserialize: function (value, format) {
        var parseFormat = typeof format == 'string' ? format : this.dateFormat,
            date = typeof value == 'string' ? value : value.date;
        return moment(date, parseFormat);
    }
});
