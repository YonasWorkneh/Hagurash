class CustomersView {
  _parentEl = document.querySelector(".customers");
  _listContainer = this._parentEl.querySelector("tbody");
  _exportBtn = this._parentEl.querySelector('.export');
  _format = this._parentEl.querySelector('.format');

  displayCustomers(customers) {
    this.customers = customers;
    this._listContainer.innerHTML = ``;
    customers.forEach((customer) => {
      this._listContainer.insertAdjacentHTML(
        "beforeend",
        this._generateHTML(customer)
      );
    });
  }
  _generateHTML(customer) {
    const regDate = new Date(customer.reg_date);
    let option = {
      day: "2-digit",
      month: "short",
      year: "numeric",
    };
    const formatedRegDate = regDate.toLocaleString("en-US", option);
    const lastActive = new Date(customer.updated_at);
    option = {
      day: "2-digit",
      month: "short",
      year: "numeric",
      hour: "2-digit",
      minute: "2-digit",
    };
    const formatedLastActive = lastActive.toLocaleString("en-US", option);
    return `
      <tr data-id="${customer.user_id}">
        <td>${customer.user_id}</td>
        <td>${customer.name}</td>
        <td>${customer.email}</td>
        <td>${formatedRegDate}</td>
        <td>${formatedLastActive}</td>
        <td>${
          +customer.bookmarked ? '<i class="fa-solid fa-check"></i>' : "&times"
        }</td>
      </tr>`;
  }
  exportHandler(handler) {
    this._format.addEventListener("submit", function (e) {
      e.preventDefault();
      handler(this._format.querySelector('#format').value);
    }.bind(this));
  }
}


export default new CustomersView();