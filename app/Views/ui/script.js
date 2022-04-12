// Graph
var ctx = document.getElementById("myChart");

var myChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember",
    ],
    datasets: [
      {
        label: 'Grafik Penjualan',
        data: [15339, 21345, 18483, 24003, 23489, 24092, 12034, 24092, 12910, 20000, 15000, 24000],
        backgroundColor: "#A3C9FE",
        hoverBackgroundColor: "#5F93CD",
        borderRadius: 8,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: false,
          },
        },
      ],
    },
    legend: {
      display: false,
    },
  },
});

let routes = {};
let templates = {};

let app_div = document.getElementById('app');

function home() {
    let div = document.createElement('div');
    let link = document.createElement('a');
    link.href = '#/about';
    link.innerText = 'About';

    div.innerHTML = '<h1>Home</h1>';
    div.appendChild(link);

    app_div.appendChild(div);
};

function about() {
    let div = document.createElement('div');
    let link = document.createElement('a');
    link.href = '#/';
    link.innerText = 'Home';

    div.innerHTML = '<h1>About</h1>';
    div.appendChild(link);

    app_div.appendChild(div);
};

function route (path, template) {
    if (typeof template === 'function') {
        return routes[path] = template;
    }
    else if (typeof template === 'string') {
        return routes[path] = templates[template];
    } else {
        return;
    };
};

function template (name, templateFunction) {
    return templates[name] = templateFunction;
};

template('home', function(){
    home();
});

template('about', function(){
    about();
});

// route('/', 'home');
// route('/about', 'about');

function resolveRoute(route) {
    try {
        return routes[route];
    } catch (e) {
        throw new Error(`Route ${route} not found`);
    };
};

function router(evt) {
    let url = window.location.hash.slice(1) || '/';
    let route = resolveRoute(url);

    route();
};

// window.addEventListener('load', router);
// window.addEventListener('hashchange', router);

class SideNavBar extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="card list-group list-group-flush rounded">
      <h4 class="list-group-item p-4 ">
        HUSEN VARIASI
      </h4>
      <a href="dashboard.html" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
      </a>
      <a href="pemasukan.html" class="list-group-item list-group-item-action py-2 ripple active">
        <i class="fas fa-chart-area fa-fw me-3"></i><span>Pemasukan</span>
      </a>
      <a href="#/" class="list-group-item list-group-item-action py-2 ripple"><i
          class="fas fa-lock fa-fw me-3"></i><span>Pengeluaran</span></a>
      <a href="#/" class="list-group-item list-group-item-action py-2 ripple"><i
          class="fas fa-chart-line fa-fw me-3"></i><span>Reseller & Dropship</span></a>
      <a href="#/" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fas fa-chart-pie fa-fw me-3"></i><span>Data Barang</span>
      </a>
    </div>
    `;
  }
}

customElements.define('side-navbar', SideNavBar);