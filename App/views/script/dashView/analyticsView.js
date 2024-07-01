class AnalyticsView {
  parentEl = document.querySelector(".dash__detail");
  bar = document.querySelector("#bar_graph");
  pie = document.querySelector("#pie_chart");

  _renderBar(recipesRating) {
    console.log(recipesRating);
    const options = {
      chart: {
        type: "bar",
      },
      series: [
        {
          name: "Rating",
          data: recipesRating.map((recipe) => recipe.rating),
        },
      ],
      xaxis: {
        categories: recipesRating.map((recipe) => recipe.title),
      },
      fill: {
        colors: ["#ffa600"],
      },
    };
    const chart = new ApexCharts(this.bar, options);
    chart.render();
  }
  _renderPie(recipesVisit) {
    console.log(recipesVisit)
    const options = {
      chart: {
        type: "donut",
      },
      series: recipesVisit.map((recipe) => +recipe.views),
      labels: recipesVisit.map((recipe) => recipe.title),
      plotOptions: {
        pie: {
          donut: {
            size: "60%",
            labels: {
              show: true,
              name: "Totals",
              value: recipesVisit.reduce((acc, recipe) => acc + Number(recipe.views), 0),
            },
          },
        },
      },
    };
    const chart = new ApexCharts(this.pie, options);
    chart.render();
  }
  renderAnalytics(recipesRating, recipesVisit) {
    try {
      this._renderBar(recipesRating);
      this._renderPie(recipesVisit);
    } catch (err) {
      console.error(err.message);
    }
  }
}

export default new AnalyticsView();
