ProcessWire.modals = ProcessWire.wire(
  {
    ___alert(msg, options) {
      UIkit.modal.alert(msg, options);
    },
    ___confirm(msg, options) {
      UIkit.modal.confirm(msg, options).then(
        function () {
          console.log("confirmed");
        },
        function () {
          console.log("canceled");
        }
      );
    },
  },
  "modals"
);
