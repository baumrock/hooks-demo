ProcessWire.modals = ProcessWire.wire(
  {
    ___alert(msg, options) {
      UIkit.modal.alert(msg, options);
    },
    ___confirm(msg, options) {
      UIkit.modal.confirm(msg, options);
    },
  },
  "modals"
);
