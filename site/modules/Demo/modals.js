ProcessWire.modals = ProcessWire.wire(
  {
    ___alert(msg, options) {
      UIkit.modal.alert(msg, options);
    },

    ___confirm(msg, options) {
      const modals = this;
      UIkit.modal.confirm(msg, options).then(
        function () {
          modals.confirmed();
        },
        function () {
          modals.canceled();
        }
      );
    },

    ___confirmed() {
      console.log("confirmed");
    },

    ___canceled() {
      console.log("canceled");
    },
  },
  "modals"
);
