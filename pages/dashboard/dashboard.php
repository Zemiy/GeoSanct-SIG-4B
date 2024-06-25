<div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Tempat Ibadah</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="map-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Kecamatan</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="business-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Pengguna</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">7,842</div>
                        <div class="cardName">Penduduk</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
            </div>

    <div class="details my-5">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>MAPS</h2>
                <a href="#" class="btn btn-primary">View All</a>
            </div>
            <div class="peta" id="map" style="height: 500px; width: 100%; border-radius: 20px; border: 5px solid white;"></div>
        </div>

        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Recent Customers</h2>
            </div>
            <table class="table">
                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../../assets/images/cat.jpg" alt="Customer Image"></div>
                    </td>
                    <td>
                        <h4>ARIS <br> <span>SAMPIT</span></h4>
                    </td>
                </tr>
                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../../assets/images/cat.jpg" alt="Customer Image"></div>
                    </td>
                    <td>
                        <h4>AGUS <br> <span>PAL 7</span></h4>
                    </td>
                </tr>
                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../../assets/images/cat.jpg" alt="Customer Image"></div>
                    </td>
                    <td>
                        <h4>Nur <br> <span>HKSN</span></h4>
                    </td>
                </tr>
                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../../assets/images/cat.jpg" alt="Customer Image"></div>
                    </td>
                    <td>
                        <h4>MADAN <br> <span>PEKAUMAN</span></h4>
                    </td>
                </tr>
                <tr>
                    <td width="60px">
                        <div class="imgBx"><img src="../../assets/images/cat.jpg" alt="Customer Image"></div>
                    </td>
                    <td>
                        <h4>HILMAN <br> <span>GAMBUT</span></h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!-- =========== Scripts =========  -->
<script src="../../assets/script/dashboard.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="../../assets/script/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    var map = L.map('map').setView([-2.539391, 112.958204], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Maps Satellite View
    // L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}?access_token={accessToken}', {
    //     maxZoom: 25,
    //     id: 'mapbox.streets',
    //     accessToken: 'pk.eyJ1IjoiZmF1eml5dXNhcmFobWFuIiwiYSI6ImNsZmpiOXBqYTJnbzUzcnBnNnJzMjB0ZHMifQ.AldZlBJVQaCALzRw-vhWiQ'
    // }).addTo(map);

    // Maps Hybrid View
    L.tileLayer('http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}?access_token={accessToken}', {
        maxZoom: 15,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiZmF1eml5dXNhcmFobWFuIiwiYSI6ImNsZmpiOXBqYTJnbzUzcnBnNnJzMjB0ZHMifQ.AldZlBJVQaCALzRw-vhWiQ'
    }).addTo(map);

    // FeatureGroup to store editable layers
    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);
    var drawControl = new L.Control.Draw({
        draw: {
            polygon: false,
            polyline: false,
            rectangle: false,
            circle: false,
            circlemarker: false
        },
        edit: {
            featureGroup: drawnItems
        }
    });
    map.addControl(drawControl);

    map.on('draw:created', function(event) {
        var layer = event.layer;
        var feature = layer.feature = layer.feature || {};
        feature.type = feature.type || "Feature";
        var props = feature.properties = feature.properties || {};
        drawnItems.addLayer(layer);
    });

    var popup = L.popup()
        .setLatLng(latlng)
        .setContent('<p>Hello world!<br />This is a nice popup.</p>')
        .openOn(map);
</script>
