<p class='uk-text-lead'>
  This file shows some example implementations to show the power of hooks in JavaScript!
</p>

<script>
  // show an alert after an alert is triggered
  ProcessWire.addHookAfter('modals::alert', function(event) {
    alert('After Hook Fired');
  });

  // modify the alert(msg) msg argument before the modal is shown
  ProcessWire.addHookBefore('modals::alert', function(event) {
    const msg = event.arguments(0);
    event.arguments(0, msg + " - hooked!");
  });

  // modify uikit's modal settings before it is shown
  ProcessWire.addHookBefore('modals::confirm', function(event) {
    let settings = event.arguments(1) || {};
    settings = Object.assign(settings, {
      i18n: {
        ok: 'Hell Yeah!'
      }
    });
    event.arguments(1, settings);
  });

  // add alerts after confirm/cancel
  ProcessWire.addHookAfter('modals::confirmed', function(event) {
    alert('Confirmed!');
  });
  ProcessWire.addHookAfter('modals::canceled', function(event) {
    alert('Canceled!');
  });
</script>

<button onclick="ProcessWire.modals.alert('xxx')">alert(xxx)</button>
<div class='uk-margin-top'></div>
<button onclick="ProcessWire.modals.confirm('xxx')">confirm(xxx)</button>
<div class='uk-margin-top'></div>