ProcessWire.addComponent("counter", {
  count: 0,

  ___increase() {
    this.count++;
    this.update();
  },

  ___decrease() {
    this.count--;
    this.update();
  },

  ___update() {
    document.querySelector(".count").textContent = this.count;
  },
});
