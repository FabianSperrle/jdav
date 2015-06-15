(function($) {

    var ColorStructure = function(element) {

        var self = this;

        this.element   = $(element);
        this.list      = $('<div class="structure-entries"></div>');
        this.input     = this.element.find('input[type=hidden]');
        this.page      = this.element.data('page');
        this.context   = this.element.parents('.fileview-sidebar').length > 0 ? 'file' : 'page';
        this.button    = this.element.find('.structure-add-button');
        this.json      = this.input.val() ? $.parseJSON(this.input.val()) : [];
        this.entries   = [];
        this.template  = Handlebars.compile(this.element.find('.structure-entries-template').html());

        this.render = function() {

            self.list.html(self.template({
                entries: self.entries
            }));

            self.list.find('.structure-add-button').on('click', function() {
                self.button.trigger('click');
                return false;
            });

            self.list.find('.structure-delete-button').on('click', function() {
                self.remove($(this).data('structure-id'));
                return false;
            });

            self.list.find('.structure-edit-button').on('click', function() {
                self.edit($(this).data('structure-id'));
                return false;
            });

            self.list.find('.structure-money-button').on('click', function() {
                self.money($(this).data('structure-id'));
                return false;
            });

            self.list.find('.structure-zettel-button').on('click', function() {
                self.zettel($(this).data('structure-id'));
                return false;
            });

            self.list.find('.structure-status-select').on('change', function() {
                self.status($(this).data('structure-id'), $(this).val());
                return false;
            });

            if(self.element.data('sortable') == true && self.list.find('.structure-entry').length > 1) {

                self.list.sortable({
                    update: function() {

                                var result = [];

                                $.each($(this).sortable('toArray'), function(i, id) {

                                    var id = id.replace('structure-entry-', '');

                                    $.each(self.entries, function(i, entry) {
                                        if(entry._id == id) {
                                            result.push(entry);
                                        }
                                    });

                                });

                                self.entries = result;
                                self.serialize();

                            }
                });

            }

            self.list.disableSelection();
            self.serialize();

        };

        this.serialize = function() {
            self.input.val(JSON.stringify(self.entries));
        };

        this.id = function() {
            return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
        };

        this.form = function(input, mode) {
            app.popup.form('editor/structure/' + self.page + '/' + self.input.attr('name') + '/' + self.context, input, null, function(form, data) {
                mode == 'add' ? self.add(data) : self.update(input._id, data);
                app.popup.hide();
            });
        };

        this.add = function(data) {
            data._id = self.id();
            self.entries.push(data);
            self.render();
        };

        this.edit = function(id) {

            var data = $.grep(self.entries, function(item) {
                return item._id == id;
            })[0];

            self.form(data, 'edit');

        };

        this.money = function(id) {
            var data = $.grep(self.entries, function(item) {
                return item._id == id;
            })[0];
            var status = data.status;

            if (status == 'liste') {
                swal('Oops', 'Aktion nicht erlaubt. Diese Person steht auf der Warteliste.', 'error');
                return;
            }

            if (status == 'einv')
                data.status = 'komplett';
            else if (status == 'komplett')
                data.status = 'einv';
            else if (status == 'bezahlt')
                data.status = 'angemeldet';
            else if (status == 'angemeldet')
                data.status = 'bezahlt';

            $.each(self.entries, function(i, item) {
                if(item._id != id) return;
                self.entries[i] = data;
            });

            self.render();
        }

        this.zettel = function(id) {
            var data = $.grep(self.entries, function(item) {
                return item._id == id;
            })[0];
            var status = data.status;

            if (status == 'liste') {
                swal('Oops', 'Aktion nicht erlaubt. Diese Person steht auf der Warteliste.', 'error');
                return;
            }

            if (status == 'einv')
                data.status = 'angemeldet';
            else if (status == 'komplett')
                data.status = 'bezahlt';
            else if (status == 'bezahlt')
                data.status = 'komplett';
            else if (status == 'angemeldet')
                data.status = 'einv';

            $.each(self.entries, function(i, item) {
                if(item._id != id) return;
                self.entries[i] = data;
            });

            self.render();
        }

        this.status = function(id, typ) {
            var data = $.grep(self.entries, function(item) {
                return item._id == id;
            })[0];

            data.typ = typ;

            $.each(self.entries, function(i, item) {
                if(item._id != id) return;
                self.entries[i] = data;
            });

            self.render();
        }

        this.update = function(id, data) {

            data._id = id;

            $.each(self.entries, function(i, item) {
                if(item._id != id) return;
                self.entries[i] = data;
            });

            self.render();

        };

        this.remove = function(id) {
            swal({
                    title: "Bist du sicher?",
                    text: "Diese Aktion kann nicht rückgängig gemacht werden!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ja, löschen!",
                    closeOnConfirm: false
                },
                function() {
                    self.entries = $.grep(self.entries, function(item) {
                        return item._id != id;
                    });
                    self.render();
                    swal("OK!", "Die Person wurde von der Teilnehmerliste gelöscht. Vergiss nicht, die Seite ganz unten zu speichern.", "success");
                }
            );
        };

        this.sort = function(list) {
            return list;
        }

        this.init = function() {

            self.element.append(self.list);

            self.button.on('click', function() {
                self.form({}, 'add');
                return false;
            });

            self.json = this.sort(self.json);

            $.each(self.json, function(i, item) {
                item['_id'] = self.id();
                self.entries.push(item);
            });

            self.render();

        };

        return this.init();

    };

    Handlebars.registerHelper('geld', function() {
        if (this.status == 'bezahlt' || this.status == 'komplett') {
            return new Handlebars.SafeString('<i class="icon fa fa-check"></i>');
        } else {
            return new Handlebars.SafeString('<i class="icon fa fa-remove"></i>');
        }
    });

    Handlebars.registerHelper('zettel', function() {
        if (this.status == 'einv' || this.status == 'komplett') {
            return new Handlebars.SafeString('<i class="icon fa fa-check"></i>');
        } else {
            return new Handlebars.SafeString('<i class="icon fa fa-remove"></i>');
        }
    });

    Handlebars.registerHelper('bezahlt', function() {
        var count = 0;
        for (var i = 0; i < this.entries.length; i++) {
            var item = this.entries[i]; 
            if(item.status != 'liste' && (item.status == 'bezahlt' || item.status == 'komplett')) {
                count++;
            }
        }
        return count;
    });

    Handlebars.registerHelper('unterschrieben', function() {
        var count = 0;
        for (var i = 0; i < this.entries.length; i++) {
            var item = this.entries[i]; 
            if(item.status != 'liste' && (item.status == 'einv' || item.status == 'komplett')) {
                count++;
            }
        }
        return count;
    });

    Handlebars.registerHelper('vegetarier', function() {
        var count = 0;
        for (var i = 0; i < this.entries.length; i++) {
            var item = this.entries[i]; 
            if(item.status != 'iste' && item.veggie == 'ja') {
                count++;
            }
        }
        return count;
    });

    Handlebars.registerHelper('farbe', function(){
        if (this.typ == 'j' || this.typ == 'a')
        return new Handlebars.SafeString('#d9edf7');
        else if (this.status == 'komplett')
        return new Handlebars.SafeString('#dff0d8');
        else if (this.status == 'liste')
        return new Handlebars.SafeString('#ffffd6');
    });

    Handlebars.registerHelper('options', function(id){
        var entry = null;
        for (var i = 0; i < this.entries.length; i++) {
            var item = this.entries[i];
            if (item.id == id) {
                entry = item;
                break;
            }
        }

        if (entry == null) return "";

        return "Hallooooo";
    });

    Handlebars.registerHelper('selected', function(typ) {
        if (this.typ == typ)
        return ' selected';
        else {
            return '';
        }
    });

    Handlebars.registerHelper('warteliste', function() {
        return this.status == 'warteliste';
    });


    $.fn.structure = function() {

        return this.each(function() {

            if($(this).data('structure')) {
                return $(this).data('structure');
            } else {
                var structure = new ColorStructure(this);
                $(this).data('structure', structure);
                return structure;
            }

        });

    };

})(jQuery);
