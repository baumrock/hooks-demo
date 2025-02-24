RockCommerce.addComponent("RcProduct", {
  // ...

  ___priceInit(money) {
    return money;
  },

  ___priceVar(money) {
    this.variations.forEach((variation) => {
      if (typeof variation == "undefined") return;
      variation.options(true).forEach((option) => {
        money = money.plus(option.money.float());
      });
    });
    return money;
  },

  ___priceTotal(money) {
    let total = money.times(this.amount);
    return this.applyDiscount(total);
  },

  ___setPriceNoDiscount(money) {
    this.priceNoDiscount = money.times(this.amount).format();
  },

  update() {
    RockCommerce.debounce("RcProduct-update", () => {
      // make sure amount is correct
      // this is because we use x-bind on amount input and cant know the input
      let amount = this.amount;
      if (amount > this.maxamount) amount = this.maxamount;
      else if (amount < this.minamount) amount = this.minamount;
      this.amount = amount;

      // calc price via hookable methods
      let money = this.money;
      money = this.priceInit(money);
      money = this.priceVar(money);
      this.setPriceNoDiscount(money);
      money = this.priceTotal(money);

      // write formatted price to price property
      // so that the frontend can subscribe via x-text=price
      this.price = money.format();
      this.priceFloat = money.float();

      this.updateUrl();
    });
  },
});
