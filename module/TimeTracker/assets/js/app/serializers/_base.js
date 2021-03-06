App.BaseSerializer = DS.RESTSerializer.extend({

    // Format: {model}_id | {model}_ids
    keyForRelationship: function(rel, kind) {
        var singular = rel.singularize();
        var underscored = singular.underscore();
        return underscored + (kind === 'belongsTo' ? "" : "s");
    },

    serializeHasMany: function(record, json, relationship) {
        var key = relationship.key,
            hasManyRecords = Ember.get(record, key);

        // Embed hasMany relationship if records exist
        if (hasManyRecords && relationship.options.embedded == 'always') {
            json[key] = [];
            hasManyRecords.forEach(function(item, index){
                json[key].push(item.serialize());
            });
        }
        // Fallback to default serialization behavior
        else {
            return this._super(record, json, relationship);
        }
    },

    serializeBelongsTo: function(record, json, relationship) {
        var key = relationship.key,
            belongsToRecord = Ember.get(record, key);

        if (relationship.options.embedded === 'always') {
            json[key] = belongsToRecord.serialize();
        }
        else {
            return this._super(record, json, relationship);
        }
    },

    extract: function (store, type, payload, id, requestType)  {
        return this._super(store, type, payload, id, requestType);
    },

    extractSingle: function(store, type, payload, id) {
        return this._super(store, type, payload, id);
    },

    serialize: function (record, options) {
        return this._super(record, options);
    }
});
