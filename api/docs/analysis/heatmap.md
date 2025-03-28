# 🔥 Mapa de calor

Obtiene una gráfica que describe la mayor concentración de origen de los jugadores.

```
[GET] /v1/analysis/heatmap
```

Ejemplo:

```bash
curl -X GET \
  -H 'Content-Type: application/json' \
  -H 'Accept: application/json' \
  -H 'X-API-KEY: API_KEY' \
  http://localhost:8080/v1/analysis/heatmap
```

Respuesta de la petición:

```json
{
  "data": {
    "map": "<div style=\"width:100%;\"><div style=\"position:relative;width:100%;height:0;padding-bottom:60%;\"><span style=\"color:#565656\">Make this Notebook Trusted to load map: File -> Trust Notebook</span><iframe srcdoc=\"&lt;!DOCTYPE html&gt;\n&lt;html&gt;\n&lt;head&gt;\n    \n    &lt;meta http-equiv=&quot;content-type&quot; content=&quot;text/html; charset=UTF-8&quot; /&gt;\n    \n        &lt;script&gt;\n            L_NO_TOUCH = false;\n            L_DISABLE_3D = false;\n        &lt;/script&gt;\n    \n    &lt;style&gt;html, body {width: 100%;height: 100%;margin: 0;padding: 0;}&lt;/style&gt;\n    &lt;style&gt;#map {position:absolute;top:0;bottom:0;right:0;left:0;}&lt;/style&gt;\n    &lt;script src=&quot;https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.js&quot;&gt;&lt;/script&gt;\n    &lt;script src=&quot;https://code.jquery.com/jquery-3.7.1.min.js&quot;&gt;&lt;/script&gt;\n    &lt;script src=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js&quot;&gt;&lt;/script&gt;\n    &lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.js&quot;&gt;&lt;/script&gt;\n    &lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.css&quot;/&gt;\n    &lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css&quot;/&gt;\n    &lt;link rel=&quot;stylesheet&quot; href=&quot;https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css&quot;/&gt;\n    &lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/all.min.css&quot;/&gt;\n    &lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.css&quot;/&gt;\n    &lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/gh/python-visualization/folium/folium/templates/leaflet.awesome.rotate.min.css&quot;/&gt;\n    \n            &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width,\n                initial-scale=1.0, maximum-scale=1.0, user-scalable=no&quot; /&gt;\n            &lt;style&gt;\n                #map_e4d86cef31e8466e9d110149f96236c7 {\n                    position: relative;\n                    width: 100.0%;\n                    height: 100.0%;\n                    left: 0.0%;\n                    top: 0.0%;\n                }\n                .leaflet-container { font-size: 1rem; }\n            &lt;/style&gt;\n        \n    &lt;script src=&quot;https://cdn.jsdelivr.net/gh/python-visualization/folium@main/folium/templates/leaflet_heat.min.js&quot;&gt;&lt;/script&gt;\n&lt;/head&gt;\n&lt;body&gt;\n    \n    \n            &lt;div class=&quot;folium-map&quot; id=&quot;map_e4d86cef31e8466e9d110149f96236c7&quot; &gt;&lt;/div&gt;\n        \n&lt;/body&gt;\n&lt;script&gt;\n    \n    \n            var map_e4d86cef31e8466e9d110149f96236c7 = L.map(\n                &quot;map_e4d86cef31e8466e9d110149f96236c7&quot;,\n                {\n                    center: [20.6736, -101.325],\n                    crs: L.CRS.EPSG3857,\n                    ...{\n  &quot;zoom&quot;: 5,\n  &quot;zoomControl&quot;: true,\n  &quot;preferCanvas&quot;: false,\n}\n\n                }\n            );\n\n            \n\n        \n    \n            var tile_layer_e3eb5f04689af4da597f00364c56683d = L.tileLayer(\n                &quot;https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png&quot;,\n                {\n  &quot;minZoom&quot;: 0,\n  &quot;maxZoom&quot;: 20,\n  &quot;maxNativeZoom&quot;: 20,\n  &quot;noWrap&quot;: false,\n  &quot;attribution&quot;: &quot;\\u00a9 CARTO&quot;,\n  &quot;subdomains&quot;: &quot;abcd&quot;,\n  &quot;detectRetina&quot;: false,\n  &quot;tms&quot;: false,\n  &quot;opacity&quot;: 1,\n}\n\n            );\n        \n    \n            tile_layer_e3eb5f04689af4da597f00364c56683d.addTo(map_e4d86cef31e8466e9d110149f96236c7);\n        \n    \n            var heat_map_bb644591c16b0f70d20a00505aa43815 = L.heatLayer(\n                [[20.6758761, -101.3521052, 40], [19.6546004, -101.2623797229, 11], [20.40548335, -101.8405220089, 7], [20.5222851, -100.8307739289, 6], [20.084423, -101.2584666363, 5], [20.8052225, -99.8837376, 5], [20.4220211, -100.9305672503, 4], [19.3207722, -99.1514677512, 3], [22.5000001, -100.4949145, 3], [20.1358065, -99.827467319, 2], [20.4325631, -100.592152144, 2], [20.59193265, -100.5979867864, 2], [18.8409773, -99.69292428360001, 2], [20.0169568, -99.6281796339, 2], [20.6720375, -103.338396, 1], [19.83028555, -101.8444214843, 1]],\n                {\n  &quot;minOpacity&quot;: 0.5,\n  &quot;maxZoom&quot;: 18,\n  &quot;radius&quot;: 25,\n  &quot;blur&quot;: 15,\n}\n            );\n        \n    \n            heat_map_bb644591c16b0f70d20a00505aa43815.addTo(map_e4d86cef31e8466e9d110149f96236c7);\n        \n&lt;/script&gt;\n&lt;/html&gt;\" style=\"position:absolute;width:100%;height:100%;left:0;top:0;border:none !important;\" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe></div></div>"
  },
  "status": 200,
  "description": "Information about the heatmap players"
}
```
