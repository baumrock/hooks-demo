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
  ProcessWire.addHookBefore('modals::confirmed', function(event) {
    alert('Confirmed! And prevented the original console.log (see console, it\'s empty!)');
    event.replace = true;
  });
  ProcessWire.addHookBefore('modals::canceled', function(event) {
    alert('Canceled! And prevented the original console.log (see console, it\'s empty!)');
    event.replace = true;
  });

  // prevent modal if checkbox is checked
  const disableModals = function(event) {
    if (!document.getElementById('disable-modals').checked) return;
    alert('modals disabled')
    event.replace = true;
  };
  ProcessWire.addHookBefore('modals::alert', disableModals);
  ProcessWire.addHookBefore('modals::confirm', disableModals);
</script>

<div class='uk-margin'>
  <label><input id='disable-modals' type='checkbox'> Disable Modals</label>
</div>

<button onclick="ProcessWire.modals.alert('xxx')">alert(xxx)</button>
<div class='uk-margin-top'></div>
<button onclick="ProcessWire.modals.confirm('xxx')">confirm(xxx)</button>
<div class='uk-margin-top'></div>

<h3>Hooked Counter</h3>

<div class='uk-margin'>
  <label><input id='hook-counter' type='checkbox'> Hook counter</label>
</div>

<div class='uk-flex uk-flex-middle' style='gap:10px'>
  <button class='uk-button' onclick="ProcessWire.counter.increase()">+</button>
  <span>Count: <span class='count'>0</span></span>
  <button class='uk-button' onclick="ProcessWire.counter.decrease()">-</button>
</div>

<script>
  ProcessWire.addHookBefore('counter::increase', function(event) {
    if (!document.getElementById('hook-counter').checked) return;
    event.replace = true;
    event.object.count += 10;
    event.object.update();
  });
  ProcessWire.addHookBefore('counter::increase', function(event) {
    if (!document.getElementById('hook-counter').checked) return;
    event.replace = true;
    event.object.count -= 10;
    event.object.update();
  });
</script>

<h3>AlpineJS Counter Example</h3>

<div x-data="{ count: 0 }" class='uk-flex uk-flex-middle' style='gap:10px'>
  <button x-on:click="count++">Increment</button>
  <span x-text="count"></span>
  <button x-on:click="count--">Decrement</button>
</div>
<div x-data="{ count: 0 }" class='uk-flex uk-flex-middle' style='gap:10px'>
  <button x-on:click="count++">Increment</button>
  <span x-text="count"></span>
  <button x-on:click="count--">Decrement</button>
</div>