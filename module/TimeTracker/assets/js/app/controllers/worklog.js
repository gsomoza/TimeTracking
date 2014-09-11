/**
 * Worklog Collection Controller
 */
App.WorklogsController = Ember.ArrayController.extend({
    itemController: 'worklog',

    queryParams:    ['dateStart', 'dateEnd'],
    dateStart:      moment().subtract(1, 'days').endOf('day').format(App.dateFormats.form),
    dateEnd:        moment().endOf('day').format(App.dateFormats.form),
    formDateStart:  moment().subtract(1, 'days').endOf('day').format(App.dateFormats.form),
    formDateEnd:    moment().endOf('day').format(App.dateFormats.form),
    newDate:        moment().startOf('day').format(App.dateFormats.form),

    actions: {

        goToReport: function () {
            this.transitionToRoute('report');
        },

        filterResults: function () {
            this.set('dateStart', this.get('formDateStart'));
            this.set('dateEnd', this.get('formDateEnd'));
        },
        
        createWorklog: function () {
            var _this = this;
            var nDate = (new App.DoctrineDateTransform()).deserialize(this.get('newDate'), 'YYYY-MM-DD');
            if (!nDate.isValid()) {
                Bootstrap.NM.push('Invalid date entered, please check your date format.', 'danger');
                return false;
            }

            var nDuration = parseFloat(this.get('newDuration'));
            if (!nDuration || nDuration < 0) {
                Bootstrap.NM.push('Invalid duration, please enter a number greater than 0 (zero).', 'danger');
                return false;
            }

            var nNote = this.get('newNotes');
            if (!nNote || !nNote.trim()) {
                Bootstrap.NM.push('No notes entered, please enter some notes in the text area.', 'danger');
                return false;
            }

            var user = this.store.find('user', this.get('session.account_id')).then(function (user) {
                var newWorklog = _this.store.createRecord('worklog', {
                    user: user,
                    date: nDate.toISOString(),
                    duration: nDuration,
                    notes: nNote
                    }),
                    promise = newWorklog.save();
                promise.then(function(worklog) {
                    _this.store.pushPayload({
                        worklog: {
                            id: worklog.get('id'),
                            duration: worklog.get('duration'),
                            date: worklog.get('date').format(App.dateFormats.mysql),
                            notes: worklog.get('notes')
                        }
                    });
                    _this.notifyPropertyChange('durationTotal');
                    Bootstrap.NM.push('Worklog created successfully!', 'success');
                }, function(reason) {
                    Ember.Logger.log(reason.responseText);
                    Bootstrap.NM.push('Error creating worklog: ' + reason.responseText, 'danger');
                });
            }, function (reason) {
                Bootstrap.NM.push('Unable to fulfill request: ' + reason.responseText, 'warning');
            });

            this.set('newDuration', '');
            this.set('newNotes', '');
        }
    },

    count: function () {
        return this.get('length');
    }.property('length'),

    durationTotal: function () {
        if(!this.get('firstObject')) return 0;
        var maxHours = this.get('session.account').getWithDefault('dayLength', 8),
            currentDate = this.get('firstObject').get('date'),
            currentHours = 0,
            sum = this.reduce(function (prev, item) {
                var itemDuration = parseFloat(item.getWithDefault('duration', 0.0)),
                    itemDate = item.get('date');
                prev += itemDuration;
                currentHours += itemDuration;
                // mark extra-hour items
                if(!itemDate.isSame(currentDate)) {
                    currentHours = itemDuration;
                    currentDate = itemDate;
                    item.set('newDay', true);
                }
                item.set('extraHour', currentHours > maxHours);
                return prev;
            }, 0.0);
        return sum.toFixed(2);
    }.property('@each.duration')

});

/**
 * Individual Worklog Controller
 */
App.WorklogController = Ember.ObjectController.extend({
    isEditing: false,
    dateInputBuffer: '',
    actions: {

        deleteWorklog: function () {
            if (confirm('Are you sure?')) {
                var worklog = this.get('model');
                worklog.deleteRecord();
                worklog.save();
            }
        },

        toggleEdit: function () {
            var editing = this.toggleProperty('isEditing');
            if (editing) {
                this.set('dateInputBuffer', this.model.get('date').format(App.dateFormats.form));
            } else {
                this.send('save');
            }
        },

        cancelEdit: function () {
            this.model.rollback();
            this.send('toggleEdit');
        },

        save: function () {
            var model = this.model;
            model.set('dateInput', this.get('dateInputBuffer'));
            model.set('user', this.get('session.account'))
            model.save();
        }

    },

    formattedDate: function () {
        var date = this.get('date');
        return (new App.DoctrineDateTransform()).serialize(date, 'YYYY-MM-DD');
    }.property('date')

});

