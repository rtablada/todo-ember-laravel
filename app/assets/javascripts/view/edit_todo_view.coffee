Todos.EditTodoView = Ember.TextField.extend
  classNames: ['edit'],

  insertNewline: ->
    @get('controller').acceptChanges();

  focusOut: ->
    @get('controller').acceptChanges();

  didInsertElement: ->
    @$().focus();
