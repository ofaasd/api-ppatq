<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://api-ppatq.test";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-documentation">
                                <a href="#endpoints-GETapi-documentation">Display Swagger API page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-oauth2-callback">
                                <a href="#endpoints-GETapi-oauth2-callback">Display Oauth2 callback pages.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-get-santri--search--">
                                <a href="#endpoints-GETapi-get-santri--search--">GET api/get/santri/{search?}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-get-kelas">
                                <a href="#endpoints-GETapi-get-kelas">GET api/get/kelas</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-get-kode-juz">
                                <a href="#endpoints-GETapi-get-kode-juz">GET api/get/kode-juz</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-get-kategori-keluhan">
                                <a href="#endpoints-GETapi-get-kategori-keluhan">GET api/get/kategori-keluhan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-get-bank">
                                <a href="#endpoints-GETapi-get-bank">GET api/get/bank</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-jenis_pembayaran">
                                <a href="#endpoints-GETapi-jenis_pembayaran">GET api/jenis_pembayaran</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kesehatan-santri">
                                <a href="#endpoints-GETapi-kesehatan-santri">GET api/kesehatan-santri</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-berita">
                                <a href="#endpoints-GETapi-berita">GET api/berita</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-dakwah">
                                <a href="#endpoints-GETapi-dakwah">GET api/dakwah</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-agenda">
                                <a href="#endpoints-GETapi-agenda">GET api/agenda</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-about">
                                <a href="#endpoints-GETapi-about">GET api/about</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-galeri">
                                <a href="#endpoints-GETapi-galeri">GET api/galeri</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-keluhan">
                                <a href="#endpoints-POSTapi-keluhan">POST api/keluhan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-rekening">
                                <a href="#endpoints-GETapi-rekening">GET api/rekening</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-tutorial-pembayaran">
                                <a href="#endpoints-GETapi-tutorial-pembayaran">GET api/tutorial-pembayaran</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-tutorial-pembayaran">
                                <a href="#endpoints-POSTapi-tutorial-pembayaran">POST api/tutorial-pembayaran</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-get-ustadz">
                                <a href="#endpoints-GETapi-get-ustadz">GET api/get-ustadz</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-get-murroby">
                                <a href="#endpoints-GETapi-get-murroby">GET api/get-murroby</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-get-staff">
                                <a href="#endpoints-GETapi-get-staff">GET api/get-staff</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kesantrian">
                                <a href="#endpoints-GETapi-kesantrian">GET api/kesantrian</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kelas-kamar">
                                <a href="#endpoints-GETapi-kelas-kamar">GET api/kelas-kamar</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kelas--id-">
                                <a href="#endpoints-GETapi-kelas--id-">GET api/kelas/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-kamar--id-">
                                <a href="#endpoints-GETapi-kamar--id-">GET api/kamar/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-ustad-login">
                                <a href="#endpoints-POSTapi-ustad-login">POST api/ustad/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-keuangan-login">
                                <a href="#endpoints-POSTapi-keuangan-login">POST api/keuangan/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-ustad-logout">
                                <a href="#endpoints-POSTapi-ustad-logout">POST api/ustad/logout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-keuangan-logout">
                                <a href="#endpoints-POSTapi-keuangan-logout">POST api/keuangan/logout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-keuangan-lapor-bayar">
                                <a href="#endpoints-POSTapi-keuangan-lapor-bayar">POST api/keuangan/lapor-bayar</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri--idUser-">
                                <a href="#endpoints-GETapi-murroby-santri--idUser-">GET api/murroby/santri/{idUser}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri-pemeriksaan--idUser-">
                                <a href="#endpoints-GETapi-murroby-santri-pemeriksaan--idUser-">GET api/murroby/santri/pemeriksaan/{idUser}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-murroby-santri-pemeriksaan">
                                <a href="#endpoints-POSTapi-murroby-santri-pemeriksaan">POST api/murroby/santri/pemeriksaan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri-pemeriksaan-detail--noInduk-">
                                <a href="#endpoints-GETapi-murroby-santri-pemeriksaan-detail--noInduk-">GET api/murroby/santri/pemeriksaan/detail/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-">
                                <a href="#endpoints-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-">GET api/murroby/santri/pemeriksaan/edit/{idPemeriksaan}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-">
                                <a href="#endpoints-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-">PUT api/murroby/santri/pemeriksaan/update/{idPemeriksaan}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-">
                                <a href="#endpoints-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-">DELETE api/murroby/santri/pemeriksaan/{idPemeriksaan}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri-perilaku--idUser-">
                                <a href="#endpoints-GETapi-murroby-santri-perilaku--idUser-">GET api/murroby/santri/perilaku/{idUser}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-murroby-santri-perilaku">
                                <a href="#endpoints-POSTapi-murroby-santri-perilaku">POST api/murroby/santri/perilaku</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri-perilaku-detail--noInduk-">
                                <a href="#endpoints-GETapi-murroby-santri-perilaku-detail--noInduk-">GET api/murroby/santri/perilaku/detail/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri-perilaku-edit--idPerilaku-">
                                <a href="#endpoints-GETapi-murroby-santri-perilaku-edit--idPerilaku-">GET api/murroby/santri/perilaku/edit/{idPerilaku}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-murroby-santri-perilaku-update--idPerilaku-">
                                <a href="#endpoints-PUTapi-murroby-santri-perilaku-update--idPerilaku-">PUT api/murroby/santri/perilaku/update/{idPerilaku}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-murroby-santri-perilaku--idPerilaku-">
                                <a href="#endpoints-DELETEapi-murroby-santri-perilaku--idPerilaku-">DELETE api/murroby/santri/perilaku/{idPerilaku}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri-kelengkapan--idUser-">
                                <a href="#endpoints-GETapi-murroby-santri-kelengkapan--idUser-">GET api/murroby/santri/kelengkapan/{idUser}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-murroby-santri-kelengkapan">
                                <a href="#endpoints-POSTapi-murroby-santri-kelengkapan">POST api/murroby/santri/kelengkapan</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri-kelengkapan-detail--noInduk-">
                                <a href="#endpoints-GETapi-murroby-santri-kelengkapan-detail--noInduk-">GET api/murroby/santri/kelengkapan/detail/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-">
                                <a href="#endpoints-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-">GET api/murroby/santri/kelengkapan/edit/{idKelengkapan}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-">
                                <a href="#endpoints-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-">PUT api/murroby/santri/kelengkapan/update/{idKelengkapan}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-">
                                <a href="#endpoints-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-">DELETE api/murroby/santri/kelengkapan/{idKelengkapan}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-uang-saku--idUser-">
                                <a href="#endpoints-GETapi-murroby-uang-saku--idUser-">GET api/murroby/uang-saku/{idUser}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-saku-masuk--noInduk-">
                                <a href="#endpoints-GETapi-murroby-saku-masuk--noInduk-">GET api/murroby/saku-masuk/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-murroby-saku-masuk">
                                <a href="#endpoints-POSTapi-murroby-saku-masuk">POST api/murroby/saku-masuk</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-murroby-saku-keluar--noInduk-">
                                <a href="#endpoints-GETapi-murroby-saku-keluar--noInduk-">GET api/murroby/saku-keluar/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-murroby-saku-keluar">
                                <a href="#endpoints-POSTapi-murroby-saku-keluar">POST api/murroby/saku-keluar</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-ustad-tahfidz-santri--idUser-">
                                <a href="#endpoints-GETapi-ustad-tahfidz-santri--idUser-">GET api/ustad-tahfidz/santri/{idUser}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-ustad-tahfidz-tahfidz--idUser-">
                                <a href="#endpoints-GETapi-ustad-tahfidz-tahfidz--idUser-">GET api/ustad-tahfidz/tahfidz/{idUser}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-">
                                <a href="#endpoints-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-">GET api/ustad-tahfidz/tahfidz/edit/{idDetailTahfidz}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-">
                                <a href="#endpoints-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-">PUT api/ustad-tahfidz/tahfidz/update/{idDetailTahfidz}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-ustad-tahfidz-tahfidz">
                                <a href="#endpoints-POSTapi-ustad-tahfidz-tahfidz">POST api/ustad-tahfidz/tahfidz</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-ustad-tahfidz-tahfidz-show--noInduk-">
                                <a href="#endpoints-GETapi-ustad-tahfidz-tahfidz-show--noInduk-">GET api/ustad-tahfidz/tahfidz/show/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-">
                                <a href="#endpoints-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-">DELETE api/ustad-tahfidz/tahfidz/{idDetailTahfidz}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-wali-santri-login">
                                <a href="#endpoints-POSTapi-wali-santri-login">POST api/wali-santri/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-wali-santri-logout">
                                <a href="#endpoints-POSTapi-wali-santri-logout">POST api/wali-santri/logout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-wali-santri-kesehatan--noInduk-">
                                <a href="#endpoints-GETapi-wali-santri-kesehatan--noInduk-">GET api/wali-santri/kesehatan/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-wali-santri-ketahfidzan--noInduk-">
                                <a href="#endpoints-GETapi-wali-santri-ketahfidzan--noInduk-">GET api/wali-santri/ketahfidzan/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-wali-santri-perilaku--noInduk-">
                                <a href="#endpoints-GETapi-wali-santri-perilaku--noInduk-">GET api/wali-santri/perilaku/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-wali-santri-kelengkapan--noInduk-">
                                <a href="#endpoints-GETapi-wali-santri-kelengkapan--noInduk-">GET api/wali-santri/kelengkapan/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-wali-santri-lapor-bayar">
                                <a href="#endpoints-POSTapi-wali-santri-lapor-bayar">POST api/wali-santri/lapor-bayar</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-wali-santri-riwayat-bayar--noInduk-">
                                <a href="#endpoints-GETapi-wali-santri-riwayat-bayar--noInduk-">GET api/wali-santri/riwayat-bayar/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-wali-santri-saku-masuk--noInduk-">
                                <a href="#endpoints-GETapi-wali-santri-saku-masuk--noInduk-">GET api/wali-santri/saku-masuk/{noInduk}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-wali-santri-saku-keluar--noInduk-">
                                <a href="#endpoints-GETapi-wali-santri-saku-keluar--noInduk-">GET api/wali-santri/saku-keluar/{noInduk}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: July 5, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://api-ppatq.test</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include a <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>Masukkan token Bearer Anda untuk mengakses endpoint yang dilindungi.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-documentation">Display Swagger API page.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-documentation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/documentation" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/documentation"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-documentation">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-documentation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-documentation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-documentation"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-documentation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-documentation">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-documentation" data-method="GET"
      data-path="api/documentation"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-documentation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-documentation"
                    onclick="tryItOut('GETapi-documentation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-documentation"
                    onclick="cancelTryOut('GETapi-documentation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-documentation"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/documentation</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-documentation"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-documentation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-documentation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-oauth2-callback">Display Oauth2 callback pages.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-oauth2-callback">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/oauth2-callback" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/oauth2-callback"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-oauth2-callback">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!doctype html&gt;
&lt;html lang=&quot;en-US&quot;&gt;
&lt;head&gt;
    &lt;title&gt;Swagger UI: OAuth2 Redirect&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;script&gt;
    &#039;use strict&#039;;
    function run () {
        var oauth2 = window.opener.swaggerUIRedirectOauth2;
        var sentState = oauth2.state;
        var redirectUrl = oauth2.redirectUrl;
        var isValid, qp, arr;

        if (/code|token|error/.test(window.location.hash)) {
            qp = window.location.hash.substring(1).replace(&#039;?&#039;, &#039;&amp;&#039;);
        } else {
            qp = location.search.substring(1);
        }

        arr = qp.split(&quot;&amp;&quot;);
        arr.forEach(function (v,i,_arr) { _arr[i] = &#039;&quot;&#039; + v.replace(&#039;=&#039;, &#039;&quot;:&quot;&#039;) + &#039;&quot;&#039;;});
        qp = qp ? JSON.parse(&#039;{&#039; + arr.join() + &#039;}&#039;,
                function (key, value) {
                    return key === &quot;&quot; ? value : decodeURIComponent(value);
                }
        ) : {};

        isValid = qp.state === sentState;

        if ((
          oauth2.auth.schema.get(&quot;flow&quot;) === &quot;accessCode&quot; ||
          oauth2.auth.schema.get(&quot;flow&quot;) === &quot;authorizationCode&quot; ||
          oauth2.auth.schema.get(&quot;flow&quot;) === &quot;authorization_code&quot;
        ) &amp;&amp; !oauth2.auth.code) {
            if (!isValid) {
                oauth2.errCb({
                    authId: oauth2.auth.name,
                    source: &quot;auth&quot;,
                    level: &quot;warning&quot;,
                    message: &quot;Authorization may be unsafe, passed state was changed in server. The passed state wasn&#039;t returned from auth server.&quot;
                });
            }

            if (qp.code) {
                delete oauth2.state;
                oauth2.auth.code = qp.code;
                oauth2.callback({auth: oauth2.auth, redirectUrl: redirectUrl});
            } else {
                let oauthErrorMsg;
                if (qp.error) {
                    oauthErrorMsg = &quot;[&quot;+qp.error+&quot;]: &quot; +
                        (qp.error_description ? qp.error_description+ &quot;. &quot; : &quot;no accessCode received from the server. &quot;) +
                        (qp.error_uri ? &quot;More info: &quot;+qp.error_uri : &quot;&quot;);
                }

                oauth2.errCb({
                    authId: oauth2.auth.name,
                    source: &quot;auth&quot;,
                    level: &quot;error&quot;,
                    message: oauthErrorMsg || &quot;[Authorization failed]: no accessCode received from the server.&quot;
                });
            }
        } else {
            oauth2.callback({auth: oauth2.auth, token: qp, isValid: isValid, redirectUrl: redirectUrl});
        }
        window.close();
    }

    if (document.readyState !== &#039;loading&#039;) {
        run();
    } else {
        document.addEventListener(&#039;DOMContentLoaded&#039;, function () {
            run();
        });
    }
&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETapi-oauth2-callback" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-oauth2-callback"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-oauth2-callback"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-oauth2-callback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-oauth2-callback">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-oauth2-callback" data-method="GET"
      data-path="api/oauth2-callback"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-oauth2-callback', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-oauth2-callback"
                    onclick="tryItOut('GETapi-oauth2-callback');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-oauth2-callback"
                    onclick="cancelTryOut('GETapi-oauth2-callback');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-oauth2-callback"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/oauth2-callback</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-oauth2-callback"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-oauth2-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-oauth2-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-get-santri--search--">GET api/get/santri/{search?}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-get-santri--search--">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/get/santri/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/get/santri/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-get-santri--search--">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-get-santri--search--" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-get-santri--search--"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-santri--search--"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-get-santri--search--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-santri--search--">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-get-santri--search--" data-method="GET"
      data-path="api/get/santri/{search?}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-get-santri--search--', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-get-santri--search--"
                    onclick="tryItOut('GETapi-get-santri--search--');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-get-santri--search--"
                    onclick="cancelTryOut('GETapi-get-santri--search--');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-get-santri--search--"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/get/santri/{search?}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-get-santri--search--"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-get-santri--search--"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-get-santri--search--"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-get-santri--search--"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-get-kelas">GET api/get/kelas</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-get-kelas">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/get/kelas" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/get/kelas"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-get-kelas">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;kode&quot;: &quot;1a&quot;
        },
        {
            &quot;kode&quot;: &quot;1b&quot;
        },
        {
            &quot;kode&quot;: &quot;2a&quot;
        },
        {
            &quot;kode&quot;: &quot;2b&quot;
        },
        {
            &quot;kode&quot;: &quot;3a&quot;
        },
        {
            &quot;kode&quot;: &quot;3b&quot;
        },
        {
            &quot;kode&quot;: &quot;4a&quot;
        },
        {
            &quot;kode&quot;: &quot;4b&quot;
        },
        {
            &quot;kode&quot;: &quot;5a&quot;
        },
        {
            &quot;kode&quot;: &quot;5b&quot;
        },
        {
            &quot;kode&quot;: &quot;6a&quot;
        },
        {
            &quot;kode&quot;: &quot;6b&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-get-kelas" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-get-kelas"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-kelas"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-get-kelas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-kelas">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-get-kelas" data-method="GET"
      data-path="api/get/kelas"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-get-kelas', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-get-kelas"
                    onclick="tryItOut('GETapi-get-kelas');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-get-kelas"
                    onclick="cancelTryOut('GETapi-get-kelas');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-get-kelas"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/get/kelas</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-get-kelas"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-get-kelas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-get-kelas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-get-kode-juz">GET api/get/kode-juz</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-get-kode-juz">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/get/kode-juz" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/get/kode-juz"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-get-kode-juz">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 57
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;kode&quot;: 126,
            &quot;nama&quot;: &quot;An-naba&quot;
        },
        {
            &quot;kode&quot;: 127,
            &quot;nama&quot;: &quot;An-nazi&#039;at&quot;
        },
        {
            &quot;kode&quot;: 128,
            &quot;nama&quot;: &quot;Abasa&quot;
        },
        {
            &quot;kode&quot;: 129,
            &quot;nama&quot;: &quot;At-takwir&quot;
        },
        {
            &quot;kode&quot;: 130,
            &quot;nama&quot;: &quot;Al-infitar&quot;
        },
        {
            &quot;kode&quot;: 131,
            &quot;nama&quot;: &quot;Al-mutaffifin&quot;
        },
        {
            &quot;kode&quot;: 132,
            &quot;nama&quot;: &quot;Al-Insyiqaq&quot;
        },
        {
            &quot;kode&quot;: 133,
            &quot;nama&quot;: &quot;Al-buruj&quot;
        },
        {
            &quot;kode&quot;: 134,
            &quot;nama&quot;: &quot;At-tariq&quot;
        },
        {
            &quot;kode&quot;: 135,
            &quot;nama&quot;: &quot;Al-a&#039;la&quot;
        },
        {
            &quot;kode&quot;: 136,
            &quot;nama&quot;: &quot;Al-ghasyiyah&quot;
        },
        {
            &quot;kode&quot;: 137,
            &quot;nama&quot;: &quot;Al-fajr&quot;
        },
        {
            &quot;kode&quot;: 138,
            &quot;nama&quot;: &quot;Al-balad&quot;
        },
        {
            &quot;kode&quot;: 139,
            &quot;nama&quot;: &quot;Asy-syams&quot;
        },
        {
            &quot;kode&quot;: 140,
            &quot;nama&quot;: &quot;Al-lail&quot;
        },
        {
            &quot;kode&quot;: 141,
            &quot;nama&quot;: &quot;Ad-dhuha&quot;
        },
        {
            &quot;kode&quot;: 142,
            &quot;nama&quot;: &quot;Al-insyirah&quot;
        },
        {
            &quot;kode&quot;: 143,
            &quot;nama&quot;: &quot;At-tin&quot;
        },
        {
            &quot;kode&quot;: 144,
            &quot;nama&quot;: &quot;Al-alaq&quot;
        },
        {
            &quot;kode&quot;: 145,
            &quot;nama&quot;: &quot;Al-qadr&quot;
        },
        {
            &quot;kode&quot;: 146,
            &quot;nama&quot;: &quot;Al-bayyinah&quot;
        },
        {
            &quot;kode&quot;: 147,
            &quot;nama&quot;: &quot;Al-zalzalah&quot;
        },
        {
            &quot;kode&quot;: 148,
            &quot;nama&quot;: &quot;Al-adiyat&quot;
        },
        {
            &quot;kode&quot;: 149,
            &quot;nama&quot;: &quot;Al-qoriah&quot;
        },
        {
            &quot;kode&quot;: 150,
            &quot;nama&quot;: &quot;At-takatsur&quot;
        },
        {
            &quot;kode&quot;: 151,
            &quot;nama&quot;: &quot;Al-ashr&quot;
        },
        {
            &quot;kode&quot;: 152,
            &quot;nama&quot;: &quot;Al-humazah&quot;
        },
        {
            &quot;kode&quot;: 153,
            &quot;nama&quot;: &quot;Al-fil&quot;
        },
        {
            &quot;kode&quot;: 154,
            &quot;nama&quot;: &quot;Al-quraisy&quot;
        },
        {
            &quot;kode&quot;: 155,
            &quot;nama&quot;: &quot;Al-maun&quot;
        },
        {
            &quot;kode&quot;: 156,
            &quot;nama&quot;: &quot;Al-kautsar&quot;
        },
        {
            &quot;kode&quot;: 157,
            &quot;nama&quot;: &quot;Al-kafirun&quot;
        },
        {
            &quot;kode&quot;: 158,
            &quot;nama&quot;: &quot;An-nasr&quot;
        },
        {
            &quot;kode&quot;: 159,
            &quot;nama&quot;: &quot;Al-lahab&quot;
        },
        {
            &quot;kode&quot;: 160,
            &quot;nama&quot;: &quot;Al-ikhlas&quot;
        },
        {
            &quot;kode&quot;: 161,
            &quot;nama&quot;: &quot;Al-falaq&quot;
        },
        {
            &quot;kode&quot;: 162,
            &quot;nama&quot;: &quot;an-naas&quot;
        },
        {
            &quot;kode&quot;: 38,
            &quot;nama&quot;: &quot;Al-Fatihah&quot;
        },
        {
            &quot;kode&quot;: 39,
            &quot;nama&quot;: &quot;Juz 1 Awal&quot;
        },
        {
            &quot;kode&quot;: 40,
            &quot;nama&quot;: &quot;Juz 1 Tengah&quot;
        },
        {
            &quot;kode&quot;: 41,
            &quot;nama&quot;: &quot;Juz 1 Akhir&quot;
        },
        {
            &quot;kode&quot;: 42,
            &quot;nama&quot;: &quot;Juz 2 Awal&quot;
        },
        {
            &quot;kode&quot;: 43,
            &quot;nama&quot;: &quot;Juz 2 Tengah&quot;
        },
        {
            &quot;kode&quot;: 44,
            &quot;nama&quot;: &quot;Juz 2 Akhir&quot;
        },
        {
            &quot;kode&quot;: 45,
            &quot;nama&quot;: &quot;Juz 3 Awal&quot;
        },
        {
            &quot;kode&quot;: 46,
            &quot;nama&quot;: &quot;Juz 3 Tengah&quot;
        },
        {
            &quot;kode&quot;: 47,
            &quot;nama&quot;: &quot;Juz 3 Akhir&quot;
        },
        {
            &quot;kode&quot;: 48,
            &quot;nama&quot;: &quot;Juz 4 Awal&quot;
        },
        {
            &quot;kode&quot;: 49,
            &quot;nama&quot;: &quot;Juz 4 Tengah&quot;
        },
        {
            &quot;kode&quot;: 50,
            &quot;nama&quot;: &quot;Juz 4 Akhir&quot;
        },
        {
            &quot;kode&quot;: 51,
            &quot;nama&quot;: &quot;Juz 5 Awal&quot;
        },
        {
            &quot;kode&quot;: 52,
            &quot;nama&quot;: &quot;Juz 5 Tengah&quot;
        },
        {
            &quot;kode&quot;: 53,
            &quot;nama&quot;: &quot;Juz 5 Akhir&quot;
        },
        {
            &quot;kode&quot;: 54,
            &quot;nama&quot;: &quot;Juz 6 Awal&quot;
        },
        {
            &quot;kode&quot;: 55,
            &quot;nama&quot;: &quot;Juz 6 Tengah&quot;
        },
        {
            &quot;kode&quot;: 56,
            &quot;nama&quot;: &quot;Juz 6 Akhir&quot;
        },
        {
            &quot;kode&quot;: 57,
            &quot;nama&quot;: &quot;Juz 7 Awal&quot;
        },
        {
            &quot;kode&quot;: 58,
            &quot;nama&quot;: &quot;Juz 7 Tengah&quot;
        },
        {
            &quot;kode&quot;: 59,
            &quot;nama&quot;: &quot;Juz 7 Akhir&quot;
        },
        {
            &quot;kode&quot;: 60,
            &quot;nama&quot;: &quot;Juz 8 Awal&quot;
        },
        {
            &quot;kode&quot;: 61,
            &quot;nama&quot;: &quot;Juz 8 Tengah&quot;
        },
        {
            &quot;kode&quot;: 62,
            &quot;nama&quot;: &quot;Juz 8 Akhir&quot;
        },
        {
            &quot;kode&quot;: 63,
            &quot;nama&quot;: &quot;Juz 9 Awal&quot;
        },
        {
            &quot;kode&quot;: 64,
            &quot;nama&quot;: &quot;Juz 9 Tengah&quot;
        },
        {
            &quot;kode&quot;: 65,
            &quot;nama&quot;: &quot;Juz 9 Akhir&quot;
        },
        {
            &quot;kode&quot;: 66,
            &quot;nama&quot;: &quot;Juz 10 Awal&quot;
        },
        {
            &quot;kode&quot;: 67,
            &quot;nama&quot;: &quot;Juz 10 Tengah&quot;
        },
        {
            &quot;kode&quot;: 68,
            &quot;nama&quot;: &quot;Juz 10 Akhir&quot;
        },
        {
            &quot;kode&quot;: 69,
            &quot;nama&quot;: &quot;Juz 11 Awal&quot;
        },
        {
            &quot;kode&quot;: 70,
            &quot;nama&quot;: &quot;Juz 11 Tengah&quot;
        },
        {
            &quot;kode&quot;: 71,
            &quot;nama&quot;: &quot;Juz 11 Akhir&quot;
        },
        {
            &quot;kode&quot;: 72,
            &quot;nama&quot;: &quot;Juz 12 Awal&quot;
        },
        {
            &quot;kode&quot;: 73,
            &quot;nama&quot;: &quot;Juz 12 Tengah&quot;
        },
        {
            &quot;kode&quot;: 74,
            &quot;nama&quot;: &quot;Juz 12 Akhir&quot;
        },
        {
            &quot;kode&quot;: 75,
            &quot;nama&quot;: &quot;Juz 13 Awal&quot;
        },
        {
            &quot;kode&quot;: 76,
            &quot;nama&quot;: &quot;Juz 13 Tengah&quot;
        },
        {
            &quot;kode&quot;: 77,
            &quot;nama&quot;: &quot;Juz 13 Akhir&quot;
        },
        {
            &quot;kode&quot;: 78,
            &quot;nama&quot;: &quot;Juz 14 Awal&quot;
        },
        {
            &quot;kode&quot;: 79,
            &quot;nama&quot;: &quot;Juz 14 Tengah&quot;
        },
        {
            &quot;kode&quot;: 80,
            &quot;nama&quot;: &quot;Juz 14 Akhir&quot;
        },
        {
            &quot;kode&quot;: 81,
            &quot;nama&quot;: &quot;Juz 15 Awal&quot;
        },
        {
            &quot;kode&quot;: 82,
            &quot;nama&quot;: &quot;Juz 15 Tengah&quot;
        },
        {
            &quot;kode&quot;: 83,
            &quot;nama&quot;: &quot;Juz 15 Akhir&quot;
        },
        {
            &quot;kode&quot;: 84,
            &quot;nama&quot;: &quot;Juz 16 Awal&quot;
        },
        {
            &quot;kode&quot;: 85,
            &quot;nama&quot;: &quot;Juz 16 Tengah&quot;
        },
        {
            &quot;kode&quot;: 86,
            &quot;nama&quot;: &quot;Juz 16 Akhir&quot;
        },
        {
            &quot;kode&quot;: 87,
            &quot;nama&quot;: &quot;Juz 17 Awal&quot;
        },
        {
            &quot;kode&quot;: 88,
            &quot;nama&quot;: &quot;Juz 17 Tengah&quot;
        },
        {
            &quot;kode&quot;: 89,
            &quot;nama&quot;: &quot;Juz 17 Akhir&quot;
        },
        {
            &quot;kode&quot;: 90,
            &quot;nama&quot;: &quot;Juz 18 Awal&quot;
        },
        {
            &quot;kode&quot;: 91,
            &quot;nama&quot;: &quot;Juz 18 Tengah&quot;
        },
        {
            &quot;kode&quot;: 92,
            &quot;nama&quot;: &quot;Juz 18 Akhir&quot;
        },
        {
            &quot;kode&quot;: 93,
            &quot;nama&quot;: &quot;Juz 19 Awal&quot;
        },
        {
            &quot;kode&quot;: 94,
            &quot;nama&quot;: &quot;Juz 19 Tengah&quot;
        },
        {
            &quot;kode&quot;: 95,
            &quot;nama&quot;: &quot;Juz 19 Akhir&quot;
        },
        {
            &quot;kode&quot;: 96,
            &quot;nama&quot;: &quot;Juz 20 Awal&quot;
        },
        {
            &quot;kode&quot;: 97,
            &quot;nama&quot;: &quot;Juz 20 Tengah&quot;
        },
        {
            &quot;kode&quot;: 98,
            &quot;nama&quot;: &quot;Juz 20 Akhir&quot;
        },
        {
            &quot;kode&quot;: 99,
            &quot;nama&quot;: &quot;Juz 21 Awal&quot;
        },
        {
            &quot;kode&quot;: 100,
            &quot;nama&quot;: &quot;Juz 21 Tengah&quot;
        },
        {
            &quot;kode&quot;: 101,
            &quot;nama&quot;: &quot;Juz 21 Akhir&quot;
        },
        {
            &quot;kode&quot;: 102,
            &quot;nama&quot;: &quot;Juz 22 Awal&quot;
        },
        {
            &quot;kode&quot;: 103,
            &quot;nama&quot;: &quot;Juz 22 Tengah&quot;
        },
        {
            &quot;kode&quot;: 104,
            &quot;nama&quot;: &quot;Juz 22 Akhir&quot;
        },
        {
            &quot;kode&quot;: 105,
            &quot;nama&quot;: &quot;Juz 23 Awal&quot;
        },
        {
            &quot;kode&quot;: 106,
            &quot;nama&quot;: &quot;Juz 23 Tengah&quot;
        },
        {
            &quot;kode&quot;: 107,
            &quot;nama&quot;: &quot;Juz 23 Akhir&quot;
        },
        {
            &quot;kode&quot;: 108,
            &quot;nama&quot;: &quot;Juz 24 Awal&quot;
        },
        {
            &quot;kode&quot;: 109,
            &quot;nama&quot;: &quot;Juz 24 Tengah&quot;
        },
        {
            &quot;kode&quot;: 110,
            &quot;nama&quot;: &quot;Juz 24 Akhir&quot;
        },
        {
            &quot;kode&quot;: 111,
            &quot;nama&quot;: &quot;Juz 25 Awal&quot;
        },
        {
            &quot;kode&quot;: 112,
            &quot;nama&quot;: &quot;Juz 25 Tengah&quot;
        },
        {
            &quot;kode&quot;: 113,
            &quot;nama&quot;: &quot;Juz 25 Akhir&quot;
        },
        {
            &quot;kode&quot;: 114,
            &quot;nama&quot;: &quot;Juz 26 Awal&quot;
        },
        {
            &quot;kode&quot;: 115,
            &quot;nama&quot;: &quot;Juz 26 Tengah&quot;
        },
        {
            &quot;kode&quot;: 116,
            &quot;nama&quot;: &quot;Juz 26 Akhir&quot;
        },
        {
            &quot;kode&quot;: 117,
            &quot;nama&quot;: &quot;Juz 27 Awal&quot;
        },
        {
            &quot;kode&quot;: 118,
            &quot;nama&quot;: &quot;Juz 27 Tengah&quot;
        },
        {
            &quot;kode&quot;: 119,
            &quot;nama&quot;: &quot;Juz 27 Akhir&quot;
        },
        {
            &quot;kode&quot;: 120,
            &quot;nama&quot;: &quot;Juz 28 Awal&quot;
        },
        {
            &quot;kode&quot;: 121,
            &quot;nama&quot;: &quot;Juz 28 Tengah&quot;
        },
        {
            &quot;kode&quot;: 122,
            &quot;nama&quot;: &quot;Juz 28 Akhir&quot;
        },
        {
            &quot;kode&quot;: 123,
            &quot;nama&quot;: &quot;Juz 29 Awal&quot;
        },
        {
            &quot;kode&quot;: 124,
            &quot;nama&quot;: &quot;Juz 29 Tengah&quot;
        },
        {
            &quot;kode&quot;: 125,
            &quot;nama&quot;: &quot;Juz 29 Akhir&quot;
        },
        {
            &quot;kode&quot;: 164,
            &quot;nama&quot;: &quot;Khataman&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-get-kode-juz" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-get-kode-juz"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-kode-juz"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-get-kode-juz" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-kode-juz">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-get-kode-juz" data-method="GET"
      data-path="api/get/kode-juz"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-get-kode-juz', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-get-kode-juz"
                    onclick="tryItOut('GETapi-get-kode-juz');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-get-kode-juz"
                    onclick="cancelTryOut('GETapi-get-kode-juz');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-get-kode-juz"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/get/kode-juz</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-get-kode-juz"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-get-kode-juz"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-get-kode-juz"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-get-kategori-keluhan">GET api/get/kategori-keluhan</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-get-kategori-keluhan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/get/kategori-keluhan" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/get/kategori-keluhan"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-get-kategori-keluhan">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 56
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;nama&quot;: &quot;FASILITAS MCK&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;nama&quot;: &quot;PEMBELAJARAN&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;nama&quot;: &quot;SISTEM PEMBAYARAN &quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;nama&quot;: &quot;LAYANAN MURROBI&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;nama&quot;: &quot;UBUDIYYAH&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;nama&quot;: &quot;FASILITAS KAMAR TIDUR&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;nama&quot;: &quot;KEBERSIHAN&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;nama&quot;: &quot;LAYANAN KESEHATAN&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;nama&quot;: &quot;LAYANAN AKADEMIK&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;nama&quot;: &quot;KETERTIBAN SANTRI&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;nama&quot;: &quot;ADAB &amp; AKHLAQ&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-get-kategori-keluhan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-get-kategori-keluhan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-kategori-keluhan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-get-kategori-keluhan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-kategori-keluhan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-get-kategori-keluhan" data-method="GET"
      data-path="api/get/kategori-keluhan"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-get-kategori-keluhan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-get-kategori-keluhan"
                    onclick="tryItOut('GETapi-get-kategori-keluhan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-get-kategori-keluhan"
                    onclick="cancelTryOut('GETapi-get-kategori-keluhan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-get-kategori-keluhan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/get/kategori-keluhan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-get-kategori-keluhan"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-get-kategori-keluhan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-get-kategori-keluhan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-get-bank">GET api/get/bank</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-get-bank">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/get/bank" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/get/bank"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-get-bank">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 55
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 0,
            &quot;nama&quot;: &quot;CASH / VA&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;nama&quot;: &quot;BANK BRI&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;nama&quot;: &quot;BANK EKSPOR INDONESIA&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;nama&quot;: &quot;BANK MANDIRI&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;nama&quot;: &quot;BANK BNI&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;nama&quot;: &quot;BANK DANAMON&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;nama&quot;: &quot;PERMATA BANK&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;nama&quot;: &quot;BANK BCA&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;nama&quot;: &quot;BANK BII&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;nama&quot;: &quot;BANK PANIN&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;nama&quot;: &quot;BANK ARTA NIAGA KENCANA&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;nama&quot;: &quot;BANK NIAGA&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;nama&quot;: &quot;BANK BUANA IND&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;nama&quot;: &quot;BANK LIPPO&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;nama&quot;: &quot;BANK NISP&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;nama&quot;: &quot;AMERICAN EXPRESS BANK LTD&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;nama&quot;: &quot;CITIBANK N.A.&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;nama&quot;: &quot;JP. MORGAN CHASE BANK, N.A.&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;nama&quot;: &quot;BANK OF AMERICA, N.A&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;nama&quot;: &quot;ING INDONESIA BANK&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;nama&quot;: &quot;BANK MULTICOR TBK.&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;nama&quot;: &quot;BANK ARTHA GRAHA&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;nama&quot;: &quot;BANK CREDIT AGRICOLE INDOSUEZ&quot;
        },
        {
            &quot;id&quot;: 23,
            &quot;nama&quot;: &quot;THE BANGKOK BANK COMP. LTD&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;nama&quot;: &quot;THE HONGKONG &amp; SHANGHAI B.C.&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;nama&quot;: &quot;THE BANK OF TOKYO MITSUBISHI UFJ LTD&quot;
        },
        {
            &quot;id&quot;: 26,
            &quot;nama&quot;: &quot;BANK SUMITOMO MITSUI INDONESIA&quot;
        },
        {
            &quot;id&quot;: 27,
            &quot;nama&quot;: &quot;BANK DBS INDONESIA&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;nama&quot;: &quot;BANK RESONA PERDANIA&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;nama&quot;: &quot;BANK MIZUHO INDONESIA&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;nama&quot;: &quot;STANDARD CHARTERED BANK&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;nama&quot;: &quot;BANK ABN AMRO&quot;
        },
        {
            &quot;id&quot;: 32,
            &quot;nama&quot;: &quot;BANK KEPPEL TATLEE BUANA&quot;
        },
        {
            &quot;id&quot;: 33,
            &quot;nama&quot;: &quot;BANK CAPITAL INDONESIA, TBK.&quot;
        },
        {
            &quot;id&quot;: 34,
            &quot;nama&quot;: &quot;BANK BNP PARIBAS INDONESIA&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;nama&quot;: &quot;BANK UOB INDONESIA&quot;
        },
        {
            &quot;id&quot;: 36,
            &quot;nama&quot;: &quot;KOREA EXCHANGE BANK DANAMON&quot;
        },
        {
            &quot;id&quot;: 37,
            &quot;nama&quot;: &quot;RABOBANK INTERNASIONAL INDONESIA&quot;
        },
        {
            &quot;id&quot;: 38,
            &quot;nama&quot;: &quot;ANZ PANIN BANK&quot;
        },
        {
            &quot;id&quot;: 39,
            &quot;nama&quot;: &quot;DEUTSCHE BANK AG.&quot;
        },
        {
            &quot;id&quot;: 40,
            &quot;nama&quot;: &quot;BANK WOORI INDONESIA&quot;
        },
        {
            &quot;id&quot;: 41,
            &quot;nama&quot;: &quot;BANK OF CHINA LIMITED&quot;
        },
        {
            &quot;id&quot;: 42,
            &quot;nama&quot;: &quot;BANK BUMI ARTA&quot;
        },
        {
            &quot;id&quot;: 43,
            &quot;nama&quot;: &quot;BANK EKONOMI&quot;
        },
        {
            &quot;id&quot;: 44,
            &quot;nama&quot;: &quot;BANK ANTARDAERAH&quot;
        },
        {
            &quot;id&quot;: 45,
            &quot;nama&quot;: &quot;BANK HAGA&quot;
        },
        {
            &quot;id&quot;: 46,
            &quot;nama&quot;: &quot;BANK IFI&quot;
        },
        {
            &quot;id&quot;: 47,
            &quot;nama&quot;: &quot;BANK CENTURY, TBK.&quot;
        },
        {
            &quot;id&quot;: 48,
            &quot;nama&quot;: &quot;BANK MAYAPADA&quot;
        },
        {
            &quot;id&quot;: 49,
            &quot;nama&quot;: &quot;BANK JABAR&quot;
        },
        {
            &quot;id&quot;: 50,
            &quot;nama&quot;: &quot;BANK DKI&quot;
        },
        {
            &quot;id&quot;: 51,
            &quot;nama&quot;: &quot;BPD DIY&quot;
        },
        {
            &quot;id&quot;: 52,
            &quot;nama&quot;: &quot;BANK JATENG&quot;
        },
        {
            &quot;id&quot;: 53,
            &quot;nama&quot;: &quot;BANK JATIM&quot;
        },
        {
            &quot;id&quot;: 54,
            &quot;nama&quot;: &quot;BPD JAMBI&quot;
        },
        {
            &quot;id&quot;: 55,
            &quot;nama&quot;: &quot;BPD ACEH&quot;
        },
        {
            &quot;id&quot;: 56,
            &quot;nama&quot;: &quot;BANK SUMUT&quot;
        },
        {
            &quot;id&quot;: 57,
            &quot;nama&quot;: &quot;BANK NAGARI&quot;
        },
        {
            &quot;id&quot;: 58,
            &quot;nama&quot;: &quot;BANK RIAU&quot;
        },
        {
            &quot;id&quot;: 59,
            &quot;nama&quot;: &quot;BANK SUMSEL&quot;
        },
        {
            &quot;id&quot;: 60,
            &quot;nama&quot;: &quot;BANK LAMPUNG&quot;
        },
        {
            &quot;id&quot;: 61,
            &quot;nama&quot;: &quot;BPD KALSEL&quot;
        },
        {
            &quot;id&quot;: 62,
            &quot;nama&quot;: &quot;BPD KALIMANTAN BARAT&quot;
        },
        {
            &quot;id&quot;: 63,
            &quot;nama&quot;: &quot;BPD KALTIM&quot;
        },
        {
            &quot;id&quot;: 64,
            &quot;nama&quot;: &quot;BPD KALTENG&quot;
        },
        {
            &quot;id&quot;: 65,
            &quot;nama&quot;: &quot;BPD SULSEL&quot;
        },
        {
            &quot;id&quot;: 66,
            &quot;nama&quot;: &quot;BANK SULUT&quot;
        },
        {
            &quot;id&quot;: 67,
            &quot;nama&quot;: &quot;BPD NTB&quot;
        },
        {
            &quot;id&quot;: 68,
            &quot;nama&quot;: &quot;BPD BALI&quot;
        },
        {
            &quot;id&quot;: 69,
            &quot;nama&quot;: &quot;BANK NTT&quot;
        },
        {
            &quot;id&quot;: 70,
            &quot;nama&quot;: &quot;BANK MALUKU&quot;
        },
        {
            &quot;id&quot;: 71,
            &quot;nama&quot;: &quot;BPD PAPUA&quot;
        },
        {
            &quot;id&quot;: 72,
            &quot;nama&quot;: &quot;BANK BENGKULU&quot;
        },
        {
            &quot;id&quot;: 73,
            &quot;nama&quot;: &quot;BPD SULAWESI TENGAH&quot;
        },
        {
            &quot;id&quot;: 74,
            &quot;nama&quot;: &quot;BANK SULTRA&quot;
        },
        {
            &quot;id&quot;: 75,
            &quot;nama&quot;: &quot;BANK NUSANTARA PARAHYANGAN&quot;
        },
        {
            &quot;id&quot;: 76,
            &quot;nama&quot;: &quot;BANK SWADESI&quot;
        },
        {
            &quot;id&quot;: 77,
            &quot;nama&quot;: &quot;BANK MUAMALAT&quot;
        },
        {
            &quot;id&quot;: 78,
            &quot;nama&quot;: &quot;BANK MESTIKA&quot;
        },
        {
            &quot;id&quot;: 79,
            &quot;nama&quot;: &quot;BANK METRO EXPRESS&quot;
        },
        {
            &quot;id&quot;: 80,
            &quot;nama&quot;: &quot;BANK SHINTA INDONESIA&quot;
        },
        {
            &quot;id&quot;: 81,
            &quot;nama&quot;: &quot;BANK MASPION&quot;
        },
        {
            &quot;id&quot;: 82,
            &quot;nama&quot;: &quot;BANK HAGAKITA&quot;
        },
        {
            &quot;id&quot;: 83,
            &quot;nama&quot;: &quot;BANK GANESHA&quot;
        },
        {
            &quot;id&quot;: 84,
            &quot;nama&quot;: &quot;BANK WINDU KENTJANA&quot;
        },
        {
            &quot;id&quot;: 85,
            &quot;nama&quot;: &quot;HALIM INDONESIA BANK&quot;
        },
        {
            &quot;id&quot;: 86,
            &quot;nama&quot;: &quot;BANK HARMONI INTERNATIONAL&quot;
        },
        {
            &quot;id&quot;: 87,
            &quot;nama&quot;: &quot;BANK KESAWAN&quot;
        },
        {
            &quot;id&quot;: 88,
            &quot;nama&quot;: &quot;BANK TABUNGAN NEGARA (PERSERO)&quot;
        },
        {
            &quot;id&quot;: 89,
            &quot;nama&quot;: &quot;BANK HIMPUNAN SAUDARA 1906, TBK .&quot;
        },
        {
            &quot;id&quot;: 90,
            &quot;nama&quot;: &quot;BANK TABUNGAN PENSIUNAN NASIONAL&quot;
        },
        {
            &quot;id&quot;: 91,
            &quot;nama&quot;: &quot;BANK SWAGUNA&quot;
        },
        {
            &quot;id&quot;: 92,
            &quot;nama&quot;: &quot;BANK JASA ARTA&quot;
        },
        {
            &quot;id&quot;: 93,
            &quot;nama&quot;: &quot;BANK MEGA&quot;
        },
        {
            &quot;id&quot;: 94,
            &quot;nama&quot;: &quot;BANK JASA JAKARTA&quot;
        },
        {
            &quot;id&quot;: 95,
            &quot;nama&quot;: &quot;BANK BUKOPIN&quot;
        },
        {
            &quot;id&quot;: 96,
            &quot;nama&quot;: &quot;BANK SYARIAH INDONESIA (BSI)&quot;
        },
        {
            &quot;id&quot;: 97,
            &quot;nama&quot;: &quot;BANK BISNIS INTERNASIONAL&quot;
        },
        {
            &quot;id&quot;: 98,
            &quot;nama&quot;: &quot;BANK SRI PARTHA&quot;
        },
        {
            &quot;id&quot;: 99,
            &quot;nama&quot;: &quot;BANK JASA JAKARTA&quot;
        },
        {
            &quot;id&quot;: 100,
            &quot;nama&quot;: &quot;BANK BINTANG MANUNGGAL&quot;
        },
        {
            &quot;id&quot;: 101,
            &quot;nama&quot;: &quot;BANK BUMIPUTERA&quot;
        },
        {
            &quot;id&quot;: 102,
            &quot;nama&quot;: &quot;BANK YUDHA BHAKTI&quot;
        },
        {
            &quot;id&quot;: 103,
            &quot;nama&quot;: &quot;BANK MITRANIAGA&quot;
        },
        {
            &quot;id&quot;: 104,
            &quot;nama&quot;: &quot;BANK AGRO NIAGA&quot;
        },
        {
            &quot;id&quot;: 105,
            &quot;nama&quot;: &quot;BANK INDOMONEX&quot;
        },
        {
            &quot;id&quot;: 106,
            &quot;nama&quot;: &quot;BANK ROYAL INDONESIA&quot;
        },
        {
            &quot;id&quot;: 107,
            &quot;nama&quot;: &quot;BANK ALFINDO&quot;
        },
        {
            &quot;id&quot;: 108,
            &quot;nama&quot;: &quot;BANK SYARIAH MEGA&quot;
        },
        {
            &quot;id&quot;: 109,
            &quot;nama&quot;: &quot;BANK INA PERDANA&quot;
        },
        {
            &quot;id&quot;: 110,
            &quot;nama&quot;: &quot;BANK HARFA&quot;
        },
        {
            &quot;id&quot;: 111,
            &quot;nama&quot;: &quot;PRIMA MASTER BANK&quot;
        },
        {
            &quot;id&quot;: 112,
            &quot;nama&quot;: &quot;BANK PERSYARIKATAN INDONESIA&quot;
        },
        {
            &quot;id&quot;: 113,
            &quot;nama&quot;: &quot;BANK AKITA&quot;
        },
        {
            &quot;id&quot;: 114,
            &quot;nama&quot;: &quot;LIMAN INTERNATIONAL BANK&quot;
        },
        {
            &quot;id&quot;: 115,
            &quot;nama&quot;: &quot;ANGLOMAS INTERNASIONAL BANK&quot;
        },
        {
            &quot;id&quot;: 116,
            &quot;nama&quot;: &quot;BANK DIPO INTERNATIONAL&quot;
        },
        {
            &quot;id&quot;: 117,
            &quot;nama&quot;: &quot;SEABANK&quot;
        },
        {
            &quot;id&quot;: 118,
            &quot;nama&quot;: &quot;BANK UIB&quot;
        },
        {
            &quot;id&quot;: 119,
            &quot;nama&quot;: &quot;BANK ARTOS IND&quot;
        },
        {
            &quot;id&quot;: 120,
            &quot;nama&quot;: &quot;BANK PURBA DANARTA&quot;
        },
        {
            &quot;id&quot;: 121,
            &quot;nama&quot;: &quot;BANK MULTI ARTA SENTOSA&quot;
        },
        {
            &quot;id&quot;: 122,
            &quot;nama&quot;: &quot;BANK MAYORA&quot;
        },
        {
            &quot;id&quot;: 123,
            &quot;nama&quot;: &quot;BANK INDEX SELINDO&quot;
        },
        {
            &quot;id&quot;: 124,
            &quot;nama&quot;: &quot;BANK VICTORIA INTERNATIONAL&quot;
        },
        {
            &quot;id&quot;: 125,
            &quot;nama&quot;: &quot;BANK EKSEKUTIF&quot;
        },
        {
            &quot;id&quot;: 126,
            &quot;nama&quot;: &quot;CENTRATAMA NASIONAL BANK&quot;
        },
        {
            &quot;id&quot;: 127,
            &quot;nama&quot;: &quot;BANK FAMA INTERNASIONAL&quot;
        },
        {
            &quot;id&quot;: 128,
            &quot;nama&quot;: &quot;BANK SINAR HARAPAN BALI&quot;
        },
        {
            &quot;id&quot;: 129,
            &quot;nama&quot;: &quot;BANK HARDA&quot;
        },
        {
            &quot;id&quot;: 130,
            &quot;nama&quot;: &quot;BANK FINCONESIA&quot;
        },
        {
            &quot;id&quot;: 131,
            &quot;nama&quot;: &quot;BANK MERINCORP&quot;
        },
        {
            &quot;id&quot;: 132,
            &quot;nama&quot;: &quot;BANK MAYBANK INDOCORP&quot;
        },
        {
            &quot;id&quot;: 133,
            &quot;nama&quot;: &quot;BANK OCBC &ndash; INDONESIA&quot;
        },
        {
            &quot;id&quot;: 134,
            &quot;nama&quot;: &quot;BANK CHINA TRUST INDONESIA&quot;
        },
        {
            &quot;id&quot;: 135,
            &quot;nama&quot;: &quot;BANK COMMONWEALTH&quot;
        },
        {
            &quot;id&quot;: 136,
            &quot;nama&quot;: &quot;Dana&quot;
        },
        {
            &quot;id&quot;: 137,
            &quot;nama&quot;: &quot;Flip &quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-get-bank" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-get-bank"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-bank"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-get-bank" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-bank">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-get-bank" data-method="GET"
      data-path="api/get/bank"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-get-bank', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-get-bank"
                    onclick="tryItOut('GETapi-get-bank');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-get-bank"
                    onclick="cancelTryOut('GETapi-get-bank');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-get-bank"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/get/bank</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-get-bank"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-get-bank"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-get-bank"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-jenis_pembayaran">GET api/jenis_pembayaran</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-jenis_pembayaran">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/jenis_pembayaran" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/jenis_pembayaran"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-jenis_pembayaran">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 54
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;jenis&quot;: &quot;SPP / Syahriyah&quot;,
            &quot;urutan&quot;: 1,
            &quot;harga&quot;: 1050000
        },
        {
            &quot;id&quot;: 16,
            &quot;jenis&quot;: &quot;Zarkasi&quot;,
            &quot;urutan&quot;: 2,
            &quot;harga&quot;: 50000
        },
        {
            &quot;id&quot;: 3,
            &quot;jenis&quot;: &quot;Uang Saku / Jajan&quot;,
            &quot;urutan&quot;: 3,
            &quot;harga&quot;: 0
        },
        {
            &quot;id&quot;: 4,
            &quot;jenis&quot;: &quot;Infaq Pembagunan&quot;,
            &quot;urutan&quot;: 4,
            &quot;harga&quot;: 0
        },
        {
            &quot;id&quot;: 5,
            &quot;jenis&quot;: &quot;Cicilan Daftar Ulang&quot;,
            &quot;urutan&quot;: 5,
            &quot;harga&quot;: 100000
        },
        {
            &quot;id&quot;: 18,
            &quot;jenis&quot;: &quot;Arwahan&quot;,
            &quot;urutan&quot;: 6,
            &quot;harga&quot;: 0
        },
        {
            &quot;id&quot;: 15,
            &quot;jenis&quot;: &quot;Saku Zarkasi&quot;,
            &quot;urutan&quot;: 7,
            &quot;harga&quot;: 0
        },
        {
            &quot;id&quot;: 12,
            &quot;jenis&quot;: &quot;Pelunasan Zarkasi&quot;,
            &quot;urutan&quot;: 8,
            &quot;harga&quot;: 0
        },
        {
            &quot;id&quot;: 17,
            &quot;jenis&quot;: &quot;Ujian Akhir Kelulusan&quot;,
            &quot;urutan&quot;: 9,
            &quot;harga&quot;: 0
        },
        {
            &quot;id&quot;: 6,
            &quot;jenis&quot;: &quot;Lain-lain&quot;,
            &quot;urutan&quot;: 10,
            &quot;harga&quot;: 0
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-jenis_pembayaran" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-jenis_pembayaran"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-jenis_pembayaran"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-jenis_pembayaran" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-jenis_pembayaran">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-jenis_pembayaran" data-method="GET"
      data-path="api/jenis_pembayaran"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-jenis_pembayaran', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-jenis_pembayaran"
                    onclick="tryItOut('GETapi-jenis_pembayaran');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-jenis_pembayaran"
                    onclick="cancelTryOut('GETapi-jenis_pembayaran');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-jenis_pembayaran"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/jenis_pembayaran</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-jenis_pembayaran"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-jenis_pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-jenis_pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-kesehatan-santri">GET api/kesehatan-santri</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-kesehatan-santri">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/kesehatan-santri" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/kesehatan-santri"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kesehatan-santri">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 53
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;no_induk&quot;: &quot;803&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1707584400,
            &quot;tinggi_badan&quot;: 148,
            &quot;berat_badan&quot;: 43,
            &quot;lingkar_pinggul&quot;: 90,
            &quot;lingkar_dada&quot;: 78,
            &quot;kondisi_gigi&quot;: &quot;BAIK&quot;,
            &quot;nama_santri&quot;: &quot;Syauqi Mayza Ivanovic&quot;
        },
        {
            &quot;no_induk&quot;: &quot;803&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1735578000,
            &quot;tinggi_badan&quot;: 149,
            &quot;berat_badan&quot;: 45,
            &quot;lingkar_pinggul&quot;: 90,
            &quot;lingkar_dada&quot;: 80,
            &quot;kondisi_gigi&quot;: &quot;bagus, lengkap&quot;,
            &quot;nama_santri&quot;: &quot;Syauqi Mayza Ivanovic&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1094&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1719766800,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sarfaraz Renaissance Derrida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1094&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1722445200,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sarfaraz Renaissance Derrida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1094&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1725123600,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sarfaraz Renaissance Derrida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1094&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1727715600,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sarfaraz Renaissance Derrida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1094&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1730394000,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sarfaraz Renaissance Derrida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1094&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1735664400,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sarfaraz Renaissance Derrida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;802&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1719766800,
            &quot;tinggi_badan&quot;: 152,
            &quot;berat_badan&quot;: 60,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rhava Aditya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;802&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1722445200,
            &quot;tinggi_badan&quot;: 152,
            &quot;berat_badan&quot;: 60,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rhava Aditya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;802&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1728061200,
            &quot;tinggi_badan&quot;: 153,
            &quot;berat_badan&quot;: 55,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rhava Aditya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;955&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Abdul Fathir Arsyadil A&#039;la&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1102&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 32,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Abdullah Ibnu Syihab&quot;
        },
        {
            &quot;no_induk&quot;: &quot;956&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Abdullah Nashir Kuncoro Hadi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;957&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Abidzar Muhammad Azza&quot;
        },
        {
            &quot;no_induk&quot;: &quot;958&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Adkhan Fahmi Fawwas&quot;
        },
        {
            &quot;no_induk&quot;: &quot;960&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Adam Zaidan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;961&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Faqih Mushoffa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1005&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Fatahillah Akbar&quot;
        },
        {
            &quot;no_induk&quot;: &quot;962&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 40,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Haidar Dhiaul Haq Ilhamuna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;963&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Zein Ni&#039;am Fattah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;964&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Zhafran Raihan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;965&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Akhmad Gibran Khalfani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;966&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alfian Nur Haqqoni&quot;
        },
        {
            &quot;no_induk&quot;: &quot;967&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alfin Izza Azzidany&quot;
        },
        {
            &quot;no_induk&quot;: &quot;968&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alif Ainul Yaqin&quot;
        },
        {
            &quot;no_induk&quot;: &quot;969&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Arjuna Ali Rohmatulloh&quot;
        },
        {
            &quot;no_induk&quot;: &quot;970&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Brave Ibrahim Al Maliki&quot;
        },
        {
            &quot;no_induk&quot;: &quot;970&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Brave Ibrahim Al Maliki&quot;
        },
        {
            &quot;no_induk&quot;: &quot;971&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 32,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Dwi Putra Armansyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1285&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Abdan Bahrul Ilmi khori Romadhon&quot;
        },
        {
            &quot;no_induk&quot;: &quot;973&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 32,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fasabbih Bismirobbikal Adhim&quot;
        },
        {
            &quot;no_induk&quot;: &quot;974&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fatih Arjuna Dzakysurur&quot;
        },
        {
            &quot;no_induk&quot;: &quot;974&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fatih Arjuna Dzakysurur&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1194&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Hafizh Humam Zada&quot;
        },
        {
            &quot;no_induk&quot;: &quot;976&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Haikal Edi Wijaya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;977&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Kenzo Gilang Abraham&quot;
        },
        {
            &quot;no_induk&quot;: &quot;978&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;M. Abyan Narendra Syarif&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1199&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Abrisam Reynand Aqeel&quot;
        },
        {
            &quot;no_induk&quot;: &quot;980&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mohammad Shaka Ibadil Kiram&quot;
        },
        {
            &quot;no_induk&quot;: &quot;981&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Lutfil Khakim&quot;
        },
        {
            &quot;no_induk&quot;: &quot;982&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Zaky Almahir Jamil&quot;
        },
        {
            &quot;no_induk&quot;: &quot;983&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Ainun Najib&quot;
        },
        {
            &quot;no_induk&quot;: &quot;241287&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Faren Nadindra Adi Mahera&quot;
        },
        {
            &quot;no_induk&quot;: &quot;985&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Azza Arkana Bahtiar&quot;
        },
        {
            &quot;no_induk&quot;: &quot;987&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Irfan Yusron Al Husna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;988&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Khafidh Al Firdaus&quot;
        },
        {
            &quot;no_induk&quot;: &quot;989&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 32,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Khafizh Al Asyari&quot;
        },
        {
            &quot;no_induk&quot;: &quot;990&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Labeeb Haydar Arrayyan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;991&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Nakhla Rafie&quot;
        },
        {
            &quot;no_induk&quot;: &quot;991&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Nakhla Rafie&quot;
        },
        {
            &quot;no_induk&quot;: &quot;992&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Naufal Abdillah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;993&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Saif Al Bahri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;994&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Syahrul Ghofur&quot;
        },
        {
            &quot;no_induk&quot;: &quot;995&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Wafiq Diya&#039;  Al Haq&quot;
        },
        {
            &quot;no_induk&quot;: &quot;996&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rafi Faiz Abdillah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;997&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Victor Arthasyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;919&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aufa Wafi Tabina&quot;
        },
        {
            &quot;no_induk&quot;: &quot;919&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aufa Wafi Tabina&quot;
        },
        {
            &quot;no_induk&quot;: &quot;998&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Wavi Aufa Multazam&quot;
        },
        {
            &quot;no_induk&quot;: &quot;999&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zain Al Kholiq Sugiono&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1000&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zidan Akbar Alfiansyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1239&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aatmadeva Sasikirono Diwangkara Gunawan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1240&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 115,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Abdullah Aniq Maulana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1241&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 113,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Abid Yusra Al Musyaffa Subhiyarsono&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1242&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Adrian Pradipta Amzari&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1243&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Bryan Resky Assafa Risal&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1244&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Daffa Albaehaqy&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1245&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 113,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Daneswara Shakir Balya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1246&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 112,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Daniyal Arfan Ghazal&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1247&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 116,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Fauzan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1248&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Hamid Dzuhaibi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1249&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 116,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Nataaijul Afkar&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1250&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Nur Qosim&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1251&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Sayyid Husain&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1252&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 108,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Al-Farezell Nadindra Setyo Gumilang&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1253&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Arsa Maulana Rauf&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1254&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Atthar Mauza Satriya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1255&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Axel Kayana Al Khalifi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1256&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Azka Ardian Raffasya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1257&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Damar Langit Zubair&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1258&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 117,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Elquthbi Zayan Raziq Jieda&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1259&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Irsyaad Machin Al Mumtaz&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1260&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Kunta Asyiqol Mustofa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1261&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Latief Akmal Alfarizqi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1262&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 117,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maheswara Ibad Ramadhan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1263&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mauza Rayhan Shaqiel Kamil&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1263&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mauza Rayhan Shaqiel Kamil&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1264&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mohammad Rizadul Umam&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1265&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 112,
            &quot;berat_badan&quot;: 15,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muchammad Wildanul Mukholladun Al Wafi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1266&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhamad Arfan Azka Ar Rasyid&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1267&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Abil Arsalan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1268&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 117,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Afzal Fahri Ar-Ruzaini&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1269&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Alfiyan &#039;Izzul Haq&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1270&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Anwar Sidiq&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1271&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 115,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Felix Ridwan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1272&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Ja&#039;far Shidiq Fitono&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1273&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Nizam Afkari&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1274&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Panji Suma Kertajaya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1275&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Rafa Habibi Al Hanan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1276&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 115,
            &quot;berat_badan&quot;: 17,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Rizki Ramadhani Abdillah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1277&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Savero Ied Mubarak&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1279&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 112,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Zhafran Zaigham&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1280&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nizzam Akbar&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1281&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rayyan  Hafidzul Ahkam Amrulloh&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1282&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 18,
            &quot;berat_badan&quot;: 118,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Salman Yusuf&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1283&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 110,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Syahrul Azka&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1284&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zakin Sanama&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1147&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Abdurrohman Mubarok Yusuf&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1148&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Abidzar Handaru Maulana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1149&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Altha Fandra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1150&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Husain&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1151&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Ibrahim Al-Hamid&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1152&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Nafi&#039; Abdillah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1153&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 115,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Rifqi Hamizan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1154&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Yusuf&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1155&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 117,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Yusuf Amar Ma&#039;ruf&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1156&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ansel Hafizh Safaraz Tarsudi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1157&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Athakha Raisya Putra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1158&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Baharuddin Alim Ardana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1159&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 114,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Danar Pandu Winata&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1160&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Dias Al Fatih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1161&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Emha Nur Ahza&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1162&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Faidhan Arifta Naradipasahya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1163&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Helki Arkhan Fazio&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1163&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Helki Arkhan Fazio&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1164&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 111,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ilham Yusuf Prasetya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1165&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mohammad Al Kayyes Chalim&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1166&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Alby Alfa Rizqi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1167&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 117,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Arvy Bannan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1168&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 35,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Ashraf  Haqi Alfarabi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1169&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Athar Alkhalifi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1170&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Daffa Rafif Arkan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1171&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Fauza Nafan Alscooterist&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1172&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Handzallah Ismail&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1173&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Kenzie Haidar&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1174&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Maftuh Yazidunniam&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1175&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Mahya Iqbal Fahmi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1176&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 115,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Maula Al Thafunizam&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1177&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Nur Al Faqih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1178&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 108,
            &quot;berat_badan&quot;: 17,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Rif&#039;at Zein&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1179&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Rohmatulloh&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1180&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Salman Al Farizi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1181&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Sholahuddin Al-Ayyubi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1181&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Sholahuddin Al-Ayyubi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1182&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nandhung Sirru Laut&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1182&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nandhung Sirru Laut&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1183&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Naufal Zidny Ahmad&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1184&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 114,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nawaf Syihabuddin Yafiq&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1185&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Niko Fawas Anindito&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1186&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Raditya Burhanuddin Muntaha&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1187&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rafandra Iqbal Susilo&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1188&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rafardhan Izza Athalla&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1189&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rizqi Maulana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1190&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sa&#039;ad Abdulloh Firdaus&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1191&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Wisanggeni Wijang Wijayanto&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1200&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Arka Asyraf Al- Fatih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1052&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Achmad Sulthan Hafiz&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1053&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Adelio Tsabit Wijaya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1054&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Afkar Virendra Almair&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1055&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 117,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Abid Aqila Rajindra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1056&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Al Fatih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1056&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Al Fatih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1057&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Azzam Nurwahid&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1058&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Mufti Azam&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1059&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Suseno&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1060&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 35,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Syaifullah Yusuf&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1061&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Akbar Dedranau Agung Sila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1062&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Amrullah Dhiyaulhaq Ramadhan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1063&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Arga Ilman Rahmatullah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1064&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Athalla Izzhaq Rajendra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1065&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Azzam Hanif Abdillah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1066&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Dem&#039;mi Eriyana Aji Santoso&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1067&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fathurrohman Al Farid&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1068&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ibrahim Adnan Dhanurendra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1069&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Isa Muhammad Syahirul &#039;Alim&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1070&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Keyda Restu Maulana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1071&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 42,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Khalifa Atharizz Ahmad&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1072&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Latif Agus Wijaya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1073&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Lutfhie Sakhi Azka&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1074&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;M. Gibran Fawwaz Habibi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1075&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mahbub Zaki&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1076&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mohammad Salman Al Fattah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1077&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Abbas Assyauqi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1078&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Ainur Rofiq&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1079&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Anjas Sakhiya Kafabih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1080&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Arsyad sholahuddin Ats-Tsauri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1081&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Bilal Assyauqy&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1082&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Fattah Al Irsyad&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1083&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 45,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Habibi Ismi Muntaha&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1084&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Naufal Yazid Al Bustami&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1085&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Nur Al Fatih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1087&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Razif Alihanafi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1088&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Rofa Azka Musadad&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1089&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Sabilul Alif&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1090&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nabil Hafiz Muswantoro&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1091&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nur Rajab Akhsan Syarif&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1092&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Razqa Baswara&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1093&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Salim Maulana Hudzaifah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1094&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sarfaraz Renaissance Derrida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1095&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sultan Muhammad El Fatih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1096&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Yusuf Naufal Azmi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1097&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zaidan Kamil&quot;
        },
        {
            &quot;no_induk&quot;: &quot;855&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Abdul Karim&quot;
        },
        {
            &quot;no_induk&quot;: &quot;856&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Alwi Lutfi Yahya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;858&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Nauval Alviansyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;860&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ahmad Uwais Alqorni&quot;
        },
        {
            &quot;no_induk&quot;: &quot;861&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alfan Najmi El Misky&quot;
        },
        {
            &quot;no_induk&quot;: &quot;862&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 147,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alghifari Kusuma Gandy&quot;
        },
        {
            &quot;no_induk&quot;: &quot;865&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 147,
            &quot;berat_badan&quot;: 50,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Himam Ashfan Naqieb&quot;
        },
        {
            &quot;no_induk&quot;: &quot;866&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ibran Azana Arziki&quot;
        },
        {
            &quot;no_induk&quot;: &quot;867&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 141,
            &quot;berat_badan&quot;: 35,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Khafid Azlul Absor&quot;
        },
        {
            &quot;no_induk&quot;: &quot;868&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Laits Atsir Alawy El-Marzuqy&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1101&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 35,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;M. Abid Aqila Putra Aziz&quot;
        },
        {
            &quot;no_induk&quot;: &quot;869&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 39,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;M. Ahsan Fu&#039;adi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;870&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 145,
            &quot;berat_badan&quot;: 40,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;M. Fakhry Yusuf&quot;
        },
        {
            &quot;no_induk&quot;: &quot;872&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Abidzar Al Ghifari&quot;
        },
        {
            &quot;no_induk&quot;: &quot;906&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Affan Putra Gumara&quot;
        },
        {
            &quot;no_induk&quot;: &quot;874&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 44,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Arjuna Al Furqon&quot;
        },
        {
            &quot;no_induk&quot;: &quot;875&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 52,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Daffa &#039;Ussadad&quot;
        },
        {
            &quot;no_induk&quot;: &quot;877&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 149,
            &quot;berat_badan&quot;: 68,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Danish Naufal Ramadhan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;878&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 149,
            &quot;berat_badan&quot;: 68,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Emier Rabbany&quot;
        },
        {
            &quot;no_induk&quot;: &quot;879&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 141,
            &quot;berat_badan&quot;: 38,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Faiz Zidan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;880&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Fauzil Haq Al Adhim&quot;
        },
        {
            &quot;no_induk&quot;: &quot;881&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 141,
            &quot;berat_badan&quot;: 38,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Haydan Azfar Ar Rafiq&quot;
        },
        {
            &quot;no_induk&quot;: &quot;882&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 159,
            &quot;berat_badan&quot;: 62,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Hafizh Al Rasyid&quot;
        },
        {
            &quot;no_induk&quot;: &quot;884&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 149,
            &quot;berat_badan&quot;: 58,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Haydar Ali Al  Af Ghony&quot;
        },
        {
            &quot;no_induk&quot;: &quot;886&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 145,
            &quot;berat_badan&quot;: 43,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Kahfie Nur Azzam&quot;
        },
        {
            &quot;no_induk&quot;: &quot;887&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Keanu Jabbar Massaid&quot;
        },
        {
            &quot;no_induk&quot;: &quot;888&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Khalim Alfarizi Fitono&quot;
        },
        {
            &quot;no_induk&quot;: &quot;889&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Khusni Kamil Mubarok&quot;
        },
        {
            &quot;no_induk&quot;: &quot;890&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Nabil Radhitya Abbiyyu&quot;
        },
        {
            &quot;no_induk&quot;: &quot;891&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 151,
            &quot;berat_badan&quot;: 59,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Nagieb Muthohhar Yusuf&quot;
        },
        {
            &quot;no_induk&quot;: &quot;892&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Nizzam Al Fariz&quot;
        },
        {
            &quot;no_induk&quot;: &quot;893&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 38,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Raihan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;907&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Rofi&#039; Kamalun Ni&#039;am&quot;
        },
        {
            &quot;no_induk&quot;: &quot;894&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Sultan Ni&#039;am Syah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;895&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 36,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Syamsullma&#039;arif Prabowo&quot;
        },
        {
            &quot;no_induk&quot;: &quot;896&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Wafi Mushoffa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;903&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 152,
            &quot;berat_badan&quot;: 47,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Zaka Rosyiqul Munazzam&quot;
        },
        {
            &quot;no_induk&quot;: &quot;897&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 32,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Zufar Yahya Assyauqi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;898&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Namir Muzakki&quot;
        },
        {
            &quot;no_induk&quot;: &quot;899&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Naufal Imdad dzul Fikar&quot;
        },
        {
            &quot;no_induk&quot;: &quot;900&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Surya Aldi Prasetyo&quot;
        },
        {
            &quot;no_induk&quot;: &quot;901&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 32,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Yusuf Maulana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1202&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Adiba Aulia Hasim&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1203&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1738429200,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Adzkiya Husna Putri Gumara&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1204&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 112,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aghistna Zahidah Alfirdausy&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1205&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1748797200,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ainaya Mubarokatun Nikmah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1206&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ainayya Fathiyyatur Rahma&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1207&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alfaya Rahma Ramadanti&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1208&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aliqa Naila Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1209&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alisa Qotrunnada&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1210&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Anindita Keisha Zahra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1211&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Annasya Adreena Saila Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1212&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Asyifa Dzakirotul Husna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1213&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746032400,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Azka Nur Makaila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1214&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 110,
            &quot;berat_badan&quot;: 15,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Azmya Mahveen Humaira&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1215&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Azzahra Asyila Bilqis&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1216&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Bilqis Haniatun Nafisah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1217&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Chairunnisa Nafeeza Rahma Ditya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1218&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 43,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Citra Nurmillah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1219&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 116,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Delisha Yumna Nazafarin&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1220&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Dzakiya Rafa Almahyra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1221&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fatia Habib&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1222&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 116,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Hafla Azkadina Sarvenaz&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1223&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 115,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ikvi Radifa Aulia&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1224&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Istadzah Mikhayla Alfathunissa Dwianto&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1225&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Kaiya Jannatin Alfafa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1226&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Khadeeja Qathrine Nada&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1227&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Khalila Salisya Hilmi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1228&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mahirah Nadia Khasanah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1229&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 122,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Malieha Zaahin Najah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1230&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maryam Isyata Karimah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1231&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 121,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nadine Putri Ramadhani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1232&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 115,
            &quot;berat_badan&quot;: 17,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Najwa Halwa Salsabila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1233&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 118,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nur Anisa Ramandani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1234&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rahajeng Arisanti&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1235&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Salsa Abida Tazkia Amaly&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1236&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Salwa Almaira&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1237&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Shezan Almahyra Azkadina&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1238&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Syakira Husna Nadiyya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1289&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746118800,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Inara Anindita Aly&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1006&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 115,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Adeva Aisya Arsyani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1007&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aisya Nurul Hikmah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1008&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 38,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aisyah Afriani Setya Pinilih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1009&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alifatul Qolbiyyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1010&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Almira Hilwa Najiyya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1011&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 119,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Amelia Nur Istiqomah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1012&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Annasya Syaqila Ramadhani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1013&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Assyifa Dewi Tungga Buana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1014&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aurin Caeli Mustopa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1015&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ayla Zafeera Shiddiqui Al- Ghifari&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1016&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 40,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Balqis Nazifa Jauharah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1103&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fairuz Medina Qotrunnada&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1017&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fathaniah Rafifah Shanum&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1018&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fukayna Zelda Zahiya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1019&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 147,
            &quot;berat_badan&quot;: 40,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Griselda Sahasika Azmi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1020&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Hanania Nabilah Khoirunnisa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1021&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Husna Assyifa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1022&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Kaesa Syakeera Rahmah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1023&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Khairani Rohmatul Jannah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1024&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Khansa Maulida Nur Syua&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1025&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 40,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Kimiko Almahyra Prameswari&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1026&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Luluk Syakirotul Azizah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1027&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maghfirotul Mukarromah Al Khansa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1028&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Malika Ayudia Inara Zavi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1029&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Marsyila Farzana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1030&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maryam Ankaa Maulida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1031&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maulidiya Husna Kamila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1031&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maulidiya Husna Kamila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1032&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nawa Cikal Anindya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1033&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 146,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nur Fatimah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1034&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 145,
            &quot;berat_badan&quot;: 40,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Putri Aulia Romadhoni&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1035&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Raisa Adelia Azzahra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1036&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 141,
            &quot;berat_badan&quot;: 36,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rifka Rifani Khanifah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1037&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rizqi Dwi Noviani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1038&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Salma Nur Fitriya Al Humairo&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1039&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Shafiyaa Putri Rochim&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1040&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Shakila Aisyah Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1041&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Syakilla Naila Ramadhani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1042&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Taqiyya Gaizka Anandara&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1043&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Wafiq Azizah Tsaaqibah Ulya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1044&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Yasmin Salwa Kafabih&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1045&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Yumna Khoirun Nisa&#039;&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1046&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zahwa Zakiyah Khanza&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1047&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zaidah Ma&#039;rifatul Hikmah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1048&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zakia Khusnun Nihaya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1049&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zannuba Nabila Dzakeera&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1050&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zhafira Lubna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1051&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 32,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zhafira Lubna Salsabila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1104&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 114,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aisyah Lubna Al Husna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1105&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ala Abqariyya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1106&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 116,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aliifah Nabila Lubna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1107&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 124,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alisha Zhafira Muhammad Mansur&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1108&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alisya Chayra Zahida Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1109&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alpiani Jauza Hidayaturrohmah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1110&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alya Syakila Inaya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1111&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aqeela Hishna Valieha Jieda&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1112&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aqila Assyifatu Haifa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1113&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Arsyila Afsheen El Nadhif&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1114&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Asna Nurul Fadilah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1115&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aulia Dewi Wijayanti&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1116&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Azmya Nasira Raesha&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1116&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 20,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Azmya Nasira Raesha&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1117&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 43,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Clarisha Aira Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1117&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 43,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Clarisha Aira Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1119&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 38,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fatimah Azzahra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1120&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fatimah Azzahra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1121&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fatimatul Fauziah Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1122&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fawwaza Fikratuha An Nadjibah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1123&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fiantika Zulfa Kamila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1124&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 26,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Hafiza Fikrul Maghfiroh&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1125&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Hazliza Aqila Syakira&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1126&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Isna Faqiha&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1127&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 130,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Jasmeen Khalisa Sulaeman&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1128&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Jevicha Viola Septyani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1129&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 45,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Jihan Nuria Fitri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1130&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Jinan Jannata Arja&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1130&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Jinan Jannata Arja&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1131&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Keisha Fathiyatu Hanifa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1132&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Khodeejah Asy&#039;ari&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1133&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Khoirina Malihatun Niswa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1134&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 23,
            &quot;berat_badan&quot;: 131,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mayza Labiqa Hafsah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1135&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mediha Zahwa Al Azzam&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1136&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 19,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Najma Nailin Najah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1137&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Naura Arsya Dzihniyya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1138&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nawal Asma Zihnina&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1139&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nuha Falahul Amin&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1140&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Qaisara Arafanajma Amrulloh&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1141&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Queen Mihrima Khaliluna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1142&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 24,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sheryl Arsyila Zanitha Ardana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1143&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 115,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Shofiyyah Hayatun Nufus&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1144&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 27,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Syakira Rytaz Nurul Aulia&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1145&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 10,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Tsuraya Fayza Zakia Asmarani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1146&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zahfrannia Nadhifa Ramadhani&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1195&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nayla Afwa Afiyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1195&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nayla Afwa Afiyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1196&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Hilwa Eka Shakira&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1196&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 125,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Hilwa Eka Shakira&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1198&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sarifah Kirom Mahfuzhoh&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1201&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 129,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alzhea Felysia Sakhi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1290&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746205200,
            &quot;tinggi_badan&quot;: 120,
            &quot;berat_badan&quot;: 18,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sheeva Chayra Aida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;908&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 141,
            &quot;berat_badan&quot;: 58,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Adellia Kusuma Rachmawati&quot;
        },
        {
            &quot;no_induk&quot;: &quot;909&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ainayya Fathiyyaturahma&quot;
        },
        {
            &quot;no_induk&quot;: &quot;910&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 149,
            &quot;berat_badan&quot;: 47,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;A&#039;isyah Rhea Hafizha Firdaus&quot;
        },
        {
            &quot;no_induk&quot;: &quot;911&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alfi Uqoila Azza&quot;
        },
        {
            &quot;no_induk&quot;: &quot;912&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 35,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alinka Nidya Putri Prasetio&quot;
        },
        {
            &quot;no_induk&quot;: &quot;913&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Alitha Yassirli Amriya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;914&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 126,
            &quot;berat_badan&quot;: 25,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aminatush Sholihah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1197&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Amirah Fazila Candrasmurti&quot;
        },
        {
            &quot;no_induk&quot;: &quot;915&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 150,
            &quot;berat_badan&quot;: 48,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Amira Fazila Rahmani Hadi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;916&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Anisatul Ilmiyyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;917&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 147,
            &quot;berat_badan&quot;: 35,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Annisa Najma Tsurayya Muhammad&quot;
        },
        {
            &quot;no_induk&quot;: &quot;918&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 146,
            &quot;berat_badan&quot;: 48,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aqilah Qolbi Nadzifah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;920&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 43,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aulia Syafa&#039;atul Uzhma&quot;
        },
        {
            &quot;no_induk&quot;: &quot;921&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Azkia Clarista Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;922&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 145,
            &quot;berat_badan&quot;: 50,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Balqis Althafun Nisa&#039;&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1004&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 155,
            &quot;berat_badan&quot;: 49,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Bilqis Derilyn Bellvania&quot;
        },
        {
            &quot;no_induk&quot;: &quot;924&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 45,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Dzakiyyah Hanun Habibah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;925&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Faida Zarufa Atikah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;926&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Farah Shakila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;927&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 36,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Hafshah Amira Kaifiy&quot;
        },
        {
            &quot;no_induk&quot;: &quot;928&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 45,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Husna Hafida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;929&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ibnatya Qanita Adiva&quot;
        },
        {
            &quot;no_induk&quot;: &quot;930&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ilyafa Syahira Aqila Tsalisa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;931&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Inda Nala Zulfa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;932&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 144,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Kalyca Najla Sakhi&quot;
        },
        {
            &quot;no_induk&quot;: &quot;933&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 146,
            &quot;berat_badan&quot;: 35,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Kanza Afrin Mumtaza&quot;
        },
        {
            &quot;no_induk&quot;: &quot;934&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 22,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Kuny Robbaniyya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;936&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 40,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maulida Istighfarina Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;937&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 133,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maulida Sahla Saida&quot;
        },
        {
            &quot;no_induk&quot;: &quot;938&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1743786000,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maulyda Alfis Sa&#039;addah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;939&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 141,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mumtaza Aleena&quot;
        },
        {
            &quot;no_induk&quot;: &quot;940&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 144,
            &quot;berat_badan&quot;: 44,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nabila Hasna Amira&quot;
        },
        {
            &quot;no_induk&quot;: &quot;941&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 45,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nabila Yassirli Amrina&quot;
        },
        {
            &quot;no_induk&quot;: &quot;942&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 141,
            &quot;berat_badan&quot;: 32,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Naila Bilqis Salsabila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;943&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 127,
            &quot;berat_badan&quot;: 23,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Najwa Nurizahwa Faidatul Umroh&quot;
        },
        {
            &quot;no_induk&quot;: &quot;944&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nasyfa Khoirina Ghiffara&quot;
        },
        {
            &quot;no_induk&quot;: &quot;945&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nayla Rahma Kamila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;946&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 144,
            &quot;berat_badan&quot;: 53,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Novia Ayu Azzahra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;947&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 144,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Qotrunnada Fajrina Salsabila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;948&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 45,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rania Yuqa Shidqia&quot;
        },
        {
            &quot;no_induk&quot;: &quot;949&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sakhila Kurnia Ayu Zevanna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;950&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Shanum Khaira Lubna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;952&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 135,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Siti Nia Husnia&quot;
        },
        {
            &quot;no_induk&quot;: &quot;953&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 150,
            &quot;berat_badan&quot;: 50,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Syakira Nur Fahira&quot;
        },
        {
            &quot;no_induk&quot;: &quot;954&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zelda  Arsyila Arrohman&quot;
        },
        {
            &quot;no_induk&quot;: &quot;809&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 144,
            &quot;berat_badan&quot;: 36,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Achsanul Husna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;810&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 152,
            &quot;berat_badan&quot;: 42,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Adzqiyanisa Zakhrofa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;811&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 138,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Afrin Ufaira Shidqiya Asna&quot;
        },
        {
            &quot;no_induk&quot;: &quot;812&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aida Nafiatul Uzma&quot;
        },
        {
            &quot;no_induk&quot;: &quot;813&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 150,
            &quot;berat_badan&quot;: 43,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aisya Alya Jazila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;814&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 151,
            &quot;berat_badan&quot;: 44,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aldila Siti Aisyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;815&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 42,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Aqila Dwi Azka Mardiana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;816&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 144,
            &quot;berat_badan&quot;: 50,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ardila Anandita Putri&quot;
        },
        {
            &quot;no_induk&quot;: &quot;817&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Arfil Maiza&quot;
        },
        {
            &quot;no_induk&quot;: &quot;818&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 146,
            &quot;berat_badan&quot;: 38,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Arifa Maulida Syifa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;819&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 137,
            &quot;berat_badan&quot;: 36,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Azkayla Ashila As Syabiya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;820&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 55,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Bilqis Arumi Faiha Rifda&quot;
        },
        {
            &quot;no_induk&quot;: &quot;821&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 21,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Chafshoh&quot;
        },
        {
            &quot;no_induk&quot;: &quot;822&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 42,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Chumaira Fazal Ikhsan&quot;
        },
        {
            &quot;no_induk&quot;: &quot;823&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Deliya Nabillatuz Zahra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;824&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 153,
            &quot;berat_badan&quot;: 59,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fajaria Salsabila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;826&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 40,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Feyda Zeyda Fadla&quot;
        },
        {
            &quot;no_induk&quot;: &quot;827&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 154,
            &quot;berat_badan&quot;: 39,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Hayla Muna Mustofa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;828&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 150,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ilda Sekar Anindya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;829&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 139,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Inggrid Azima Azzahra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;831&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 148,
            &quot;berat_badan&quot;: 34,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Janeta Candice&quot;
        },
        {
            &quot;no_induk&quot;: &quot;832&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 146,
            &quot;berat_badan&quot;: 38,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Keysha Zhafira Sofia&quot;
        },
        {
            &quot;no_induk&quot;: &quot;833&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 39,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Lucya Rosalina&quot;
        },
        {
            &quot;no_induk&quot;: &quot;834&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 148,
            &quot;berat_badan&quot;: 33,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Maulida Izzatin Nishfa Laila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;835&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Minkhatin Shirfa Nuhyana&quot;
        },
        {
            &quot;no_induk&quot;: &quot;836&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 152,
            &quot;berat_badan&quot;: 45,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Mutia Rahma Assegaf&quot;
        },
        {
            &quot;no_induk&quot;: &quot;837&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 150,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Naura Bilqis Ayunda&quot;
        },
        {
            &quot;no_induk&quot;: &quot;838&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 128,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Naura Ummu Raisya&quot;
        },
        {
            &quot;no_induk&quot;: &quot;839&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 131,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Nur Fitria Azzahro&#039;&quot;
        },
        {
            &quot;no_induk&quot;: &quot;840&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 152,
            &quot;berat_badan&quot;: 42,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Qurrota A&#039;yun&quot;
        },
        {
            &quot;no_induk&quot;: &quot;841&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 142,
            &quot;berat_badan&quot;: 37,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Radinka Nayla Kamila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;842&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 145,
            &quot;berat_badan&quot;: 48,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Rahil Senia Avanza&quot;
        },
        {
            &quot;no_induk&quot;: &quot;843&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 134,
            &quot;berat_badan&quot;: 29,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Salsabila Ramadhani Nur&quot;
        },
        {
            &quot;no_induk&quot;: &quot;844&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 136,
            &quot;berat_badan&quot;: 28,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Salwa Nayla Munawwaroh&quot;
        },
        {
            &quot;no_induk&quot;: &quot;845&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 43,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Shakila Ibna Maritz&quot;
        },
        {
            &quot;no_induk&quot;: &quot;846&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 151,
            &quot;berat_badan&quot;: 60,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Silvia Salsabila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;848&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 146,
            &quot;berat_badan&quot;: 48,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Sofia Nur Rahma&quot;
        },
        {
            &quot;no_induk&quot;: &quot;849&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 154,
            &quot;berat_badan&quot;: 49,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Syifa Aida Nakhar&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1100&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 132,
            &quot;berat_badan&quot;: 31,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Syifa As-Syafiyah&quot;
        },
        {
            &quot;no_induk&quot;: &quot;1500&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 144,
            &quot;berat_badan&quot;: 32,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Ulfa farihatul Ulya Alzahra&quot;
        },
        {
            &quot;no_induk&quot;: &quot;852&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 143,
            &quot;berat_badan&quot;: 38,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zahira Faifa Al Basyir&quot;
        },
        {
            &quot;no_induk&quot;: &quot;853&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 148,
            &quot;berat_badan&quot;: 53,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zahra Kamilatun Nisa&#039;&quot;
        },
        {
            &quot;no_induk&quot;: &quot;854&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 152,
            &quot;berat_badan&quot;: 39,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Zheyra Zida Falasifa&quot;
        },
        {
            &quot;no_induk&quot;: &quot;825&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 148,
            &quot;berat_badan&quot;: 52,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Fayza Kulla Azmina&quot;
        },
        {
            &quot;no_induk&quot;: &quot;830&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1746378000,
            &quot;tinggi_badan&quot;: 152,
            &quot;berat_badan&quot;: 40,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Isabelle Aufa Marsya Kamila&quot;
        },
        {
            &quot;no_induk&quot;: &quot;241288&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1750957200,
            &quot;tinggi_badan&quot;: 140,
            &quot;berat_badan&quot;: 30,
            &quot;lingkar_pinggul&quot;: null,
            &quot;lingkar_dada&quot;: null,
            &quot;kondisi_gigi&quot;: null,
            &quot;nama_santri&quot;: &quot;Muhammad Luthfi Albukhori&quot;
        },
        {
            &quot;no_induk&quot;: &quot;99999999&quot;,
            &quot;tanggal_pemeriksaan&quot;: 1748710800,
            &quot;tinggi_badan&quot;: 123,
            &quot;berat_badan&quot;: 0,
            &quot;lingkar_pinggul&quot;: 45,
            &quot;lingkar_dada&quot;: 0,
            &quot;kondisi_gigi&quot;: &quot;baik&quot;,
            &quot;nama_santri&quot;: &quot;Santri Test&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-kesehatan-santri" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kesehatan-santri"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kesehatan-santri"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kesehatan-santri" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kesehatan-santri">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kesehatan-santri" data-method="GET"
      data-path="api/kesehatan-santri"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kesehatan-santri', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kesehatan-santri"
                    onclick="tryItOut('GETapi-kesehatan-santri');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kesehatan-santri"
                    onclick="cancelTryOut('GETapi-kesehatan-santri');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kesehatan-santri"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kesehatan-santri</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-kesehatan-santri"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kesehatan-santri"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kesehatan-santri"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-berita">GET api/berita</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-berita">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/berita" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/berita"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-berita">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 52
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;judul&quot;: &quot;Pengumuman Hasil Prestasi&quot;,
                &quot;thumbnail&quot;: &quot;20250701113722513743148_2763266970541351_3016163043919680259_n.jpg&quot;,
                &quot;gambar_dalam&quot;: &quot;20250701113722513743148_2763266970541351_3016163043919680259_n.jpg&quot;,
                &quot;isi_berita&quot;: &quot;&lt;div&gt;&lt;br&gt;Prestasi Pada Asesmen Sumatif Akhir Semester Genao (ASASG) 2024/2025&lt;br&gt;___________________&lt;br&gt;Dengan berucap A l h a m d u l i l l a h, kegiatan belajar mengajar TP. 2024/2025 di &lt;a href=\&quot;https://www.facebook.com/mitq.raudlatulfalah?__cft__[0]=AZWTfqyLb4FdkRlz53ZswCmtBo93NvQHtDaHjm3u89ML3sZ3DdXOTZlLr1T8c2y5rfqEdWOP6hLfpXad1l5Sbj5zVINTxVIltw6kIstuIanG3w1BqYfaIPrQvefCEoCwRY3cjQg_Ph336gd-DibYx_OIma9yLP7gqlELEB-7bDz7XCFGEMrRJRlS0erkwWQJqbsiH8Ouuyh3w00-a97mjwqw&amp;amp;__tn__=-]K-R\&quot;&gt;Mitq Raudlatul Falah&lt;/a&gt; telah terselesaikan.&amp;nbsp;&lt;br&gt;Pada asesmen kali ini semua anak memiliki satu keistimewaan tersendiri yang berbeda satu sama lainnya. Tenaga pendidik dan pengajar telah berusaha mengembangkan potensi pada anak sehingga anak menjadi tumbuh sebagaimana qudr&acirc;t yang telah digariskan-Nya.&amp;nbsp;&lt;br&gt;Proses pengembangan itu akan berhasil jika semua mendukung segala kebijakan dan keputusan pondok maupun madrasah untuk putra-putrinya.&amp;nbsp;&lt;br&gt;Dukungan Wali Santri sebagai penanggung jawab fisik harus sejalan dengan guru selaku pembina ruhani. Keseimbangan dua poros ini yang akan menghantarkan putra-putri menjadi saleh-salehah dunia-akhirat.&lt;br&gt;Peringkat dalam KBM MI adalah sebuah bonus yang bukan segala-galanya. Artinya jangan sampai dengan perolehan prestasi membuat putra-putri menjadi angkuh membusungkan dada dan merasa pintar sendiri. Sebaliknya, bagi yang belum meraih peringkat bukan berarti harus berhenti belajar dan putus asa dalam diri.&lt;br&gt;Selagi masih mau belajar InsyaAllah akan mengalir berkah dan manfaat&lt;br&gt;Berikut dokumentasi &amp;amp; daftar peringkat prestasi santri 5 besar.&lt;/div&gt;&quot;
            },
            {
                &quot;judul&quot;: &quot;KBM TAHFIDZ PERDANA SANTRI BARU TP. 2025/2026&quot;,
                &quot;thumbnail&quot;: &quot;20250625085005509419199_2756740097860705_4943935638614750012_n.jpg&quot;,
                &quot;gambar_dalam&quot;: &quot;20250625085005509419199_2756740097860705_4943935638614750012_n.jpg&quot;,
                &quot;isi_berita&quot;: &quot;&lt;div&gt;&lt;br&gt;KBM TAHFIDZ PERDANA SANTRI BARU TP. 2025/2026&lt;br&gt;_______________________________&lt;br&gt;Rangkaian kegiatan pagi ( Subuh )hari ini hingga seminggu ke depan adalah masa adaptasi santri mengawali berkegiatan di lingkungan madrasah dan pondok khususnya santri baru. &lt;br&gt;Dengan rangkaian kegiatan tersebut diharapkan santri lebih siap untuk tinggal di pesantren, guna menghafalkan Al-Qur&#039;an dan mendalami pengetahuan Agama Islam&lt;br&gt;_______________________________&lt;br&gt;Matsama &amp;amp; Jeda Semester Hari Pertama&lt;br&gt;Pada Matsama di hari pertama dengan kegiatan terjadwal :&lt;br&gt;1. KBM Aktif pagi ini dengan memperkenalkan tempat &amp;amp; halaqoh tahfidz masing-masing. &lt;br&gt;2.Pentingnya menata niat yang benar dalam mondok dan tahfidzul Qur&#039;an&lt;br&gt;Dengan niat yang benar, akan menjadi dorongan energi positif santri dalam mengenyam pendidikan di pondok pesantren. Dan niat benar di awal sangat penting untuk menentukan keberhasilan di masa depan.&lt;br&gt;b. Kesungguhan dalam menghafal dan belajar tak putus asa, tak banyak mengeluh, tak berhenti di tengah jalan. Sabar dan terus berusaha&lt;br&gt;Selagi terus berusaha dengan sungguh-sungguh pasti keberhasilan kan didapat. &lt;br&gt;c. Pentingnya menaruh rasa saling menghormati&lt;br&gt;Hormat, taat dan patuh kepada guru serta peraturan adalah kunci sukses keberhasilan santri di pesantren. Hilang nilai hormat kepada guru bisa mengakibatkan santri terhalang dalam meraih ilmu pengetahuan. &lt;br&gt;Hormat dan saling menghormati antar sesama santri akan menumbuhkan rasa kekeluargaan dan kebersamaan santri, sehingga membuat santri semakin nyaman dan betah tinggal di lingkungan pesantren.&lt;br&gt;Santri yang sudah lama, harus berjiwa sebagai kakak yang baik dan memiliki kasih sayang bagi adik kelasnya.&lt;br&gt;Sedangkan santri baru, harus berjiwa sebagai adik yang baik dan menghormati kakak kelasnya.&lt;br&gt;d. Taat dan patuh pada peraturan pondok. Dengan patuh maka akan banyak harapan santri terfutuh hatinya hingga memudahkan dalam menggapai citanya selama bertholabah dan menghafal&lt;br&gt;3. Juga mengenalkan per individu guru/ustd ustdah dan lingkungan pondok beserta batas-batasnya. &lt;br&gt;4. Kegiatan matsama di hari pertama ditutup dengan kegiatan kelas dipandu guru kelas masing-masing dilanjutkan sholat dhuha bersama. &lt;br&gt;&lt;a href=\&quot;https://www.facebook.com/hashtag/pekanmatsama?__eep__=6&amp;amp;__cft__[0]=AZUVy2HHMmf4LxjW7oImQAo-AqP4rSpcSXC_mAjUI40yhtzV7hbUGryIWMm04QqkNdzGg4QeiApyWchB-fuCyL2yNk4kMXPMyGTPN5eFSONADQe4Y32lCDNrRFN6EEEP5IEZ46NFaEkERFaDs3rFT-hVhAXQauW-H4X-bygy5pE83arQ6euh0zAxCEhXBLtcqjjHLO0uQHo9mXuZjfd3tGMC&amp;amp;__tn__=*NK-R\&quot;&gt;#PekanMatsama&lt;/a&gt;&lt;br&gt;&lt;a href=\&quot;https://www.facebook.com/hashtag/enakmondok?__eep__=6&amp;amp;__cft__[0]=AZUVy2HHMmf4LxjW7oImQAo-AqP4rSpcSXC_mAjUI40yhtzV7hbUGryIWMm04QqkNdzGg4QeiApyWchB-fuCyL2yNk4kMXPMyGTPN5eFSONADQe4Y32lCDNrRFN6EEEP5IEZ46NFaEkERFaDs3rFT-hVhAXQauW-H4X-bygy5pE83arQ6euh0zAxCEhXBLtcqjjHLO0uQHo9mXuZjfd3tGMC&amp;amp;__tn__=*NK-R\&quot;&gt;#EnakMondok&lt;/a&gt;&lt;/div&gt;&quot;
            },
            {
                &quot;judul&quot;: &quot;Tes Seleksi Simaan  Calon Khotimin-Khotimat 2025 Pondok Pesantren Anak-anak Tahfidzul Qur&#039;an Raudlatul Falah&quot;,
                &quot;thumbnail&quot;: &quot;20250621202837509604819_2754629134738468_8236084414981491625_n.jpg&quot;,
                &quot;gambar_dalam&quot;: &quot;20250621202837509604819_2754629134738468_8236084414981491625_n.jpg&quot;,
                &quot;isi_berita&quot;: &quot;&lt;div&gt;&lt;br&gt;Tes Seleksi Simaan &lt;br&gt;Calon Khotimin-Khotimat 2025&lt;br&gt;&lt;a href=\&quot;https://www.facebook.com/PPATQRF?__cft__[0]=AZWMJiYF23_sHRkOHDz0lzVVxHxmsnjZtPiy6lZuCIZiS4LwvZIYmlASl5lvgUcUbq5Q9fnxybGeYUqqtxszI6drEZxIwwoqnxGWJAFqr7AEd2ZPfu6sT91AuLfqEFbtIFlaFJLU59g68Tv9YuHN9aNAyijfvpHNCE1yXdZeH2kbhhQsV1LuG4pwh5EOrOE7Z97lo_R-cJi_63ZNLJEGVNbd&amp;amp;__tn__=-]K-R\&quot;&gt;Pondok Pesantren Anak-anak Tahfidzul Qur&#039;an Raudlatul Falah&lt;/a&gt;&lt;br&gt;_______________________&lt;br&gt;Mengikuti hal yang baik akan menjadikan tambah baik. Termasuk program baru penyeleksian lewat tes seleksi simaan yang dihadiri oleh wali santri calon khotimin itu sendiri.&lt;br&gt;Ada tiga tahapan dalam hal ini yang harus dilalui oleh calon khotimin agar benar menjadi Khotimin-Khotimat di haflah Khotmil Qur&#039;an 2025. Dan hari ini adalah tahap kedua.&lt;br&gt;Tahap kedua calon Khotimin-Khotimat harus berjuang lebih agar sampai pada batas kelolosan yang dibuktikan di depan walinya masing-masing. &lt;br&gt;Tujuan tetap sama dalam jangka panjangnya, yaitu terbiasa rajin dan terampil memelihara al-Quran.&lt;br&gt;Kegiatan ini disimak oleh ;&lt;br&gt;&radic; guru halaqoh tahfidz &lt;br&gt;&radic; santri pendamping (diutamakan telah hatam)&lt;br&gt;&radic; wali santri bersangkutan &lt;br&gt;________________________&lt;br&gt;Mohon doa restu kepada semua wali santri, agar semua kegiatan berjalan lancar dan istiqomah. Santri &lt;a href=\&quot;https://www.facebook.com/ppatq.raudlatulfalah?__cft__[0]=AZWMJiYF23_sHRkOHDz0lzVVxHxmsnjZtPiy6lZuCIZiS4LwvZIYmlASl5lvgUcUbq5Q9fnxybGeYUqqtxszI6drEZxIwwoqnxGWJAFqr7AEd2ZPfu6sT91AuLfqEFbtIFlaFJLU59g68Tv9YuHN9aNAyijfvpHNCE1yXdZeH2kbhhQsV1LuG4pwh5EOrOE7Z97lo_R-cJi_63ZNLJEGVNbd&amp;amp;__tn__=-]K-R\&quot;&gt;Ppatq Raudlatul Falah&lt;/a&gt; dengan program ini lebih bersemangat untuk mewujudkan cita-citanya menjadi ahlul qur&#039;an. Amin&lt;/div&gt;&quot;
            },
            {
                &quot;judul&quot;: &quot;Hatam Hafalan 30 Juz Lewat Tes Harian Abah KH. Noor Shokhib&quot;,
                &quot;thumbnail&quot;: &quot;20250621202623502376157_2755002318034483_8345859634985871424_n.jpg&quot;,
                &quot;gambar_dalam&quot;: &quot;20250621202623502376157_2755002318034483_8345859634985871424_n.jpg&quot;,
                &quot;isi_berita&quot;: &quot;&lt;div&gt;&lt;br&gt;Tabarukan Khataman 30 Juz Bil Hifdzi&lt;br&gt;Alumni &lt;a href=\&quot;https://www.facebook.com/PPATQRF?__cft__[0]=AZWmEGvF2tNaWiMW6VjFh7lJQnuWtb4R-t3cygr1wPFQbXVMVC9B4-_1RNoUJWz3ttAj1uNMs8Y549iWE8rZaTbUiW3IQy00IucziH-5_H-U-V0hNbY9RrGaIoGMwD8A4-ygNH38zafN0iwicqd4SAYRqHGAeTymQiwyNXzIY06JMHy03mBymli4JudDxGDi7DAU5RZlSKDL0Un2oIdmr5Ck&amp;amp;__tn__=-]K-R\&quot;&gt;Pondok Pesantren Anak-anak Tahfidzul Qur&#039;an Raudlatul Falah&lt;/a&gt;&lt;br&gt;______________________&lt;br&gt; Selamat dan Semoga Berkah&lt;br&gt;Semoga menjadi Hafidz yang Amali &lt;br&gt;Pagi tadi kembali ada khataman 30 juz bil Hifdzi setoran pada Abah Shokhib santri atas nama :&lt;br&gt; MUHAMMAD SYAFI&#039;IUL ANAM&lt;br&gt;Bin : Alm Bp. Rofi&#039;i&lt;br&gt;Asal : Jepara&lt;br&gt;Kelompok halaqoh : Ust. Ahmad Agus Miftahu Yusuf, AH, S.Pd.I&lt;br&gt;Haflah tahun : 2022&lt;br&gt;Ananda merupakan alumni &lt;a href=\&quot;https://www.facebook.com/mitq.raudlatulfalah?__cft__[0]=AZWmEGvF2tNaWiMW6VjFh7lJQnuWtb4R-t3cygr1wPFQbXVMVC9B4-_1RNoUJWz3ttAj1uNMs8Y549iWE8rZaTbUiW3IQy00IucziH-5_H-U-V0hNbY9RrGaIoGMwD8A4-ygNH38zafN0iwicqd4SAYRqHGAeTymQiwyNXzIY06JMHy03mBymli4JudDxGDi7DAU5RZlSKDL0Un2oIdmr5Ck&amp;amp;__tn__=-]K-R\&quot;&gt;Mitq Raudlatul Falah&lt;/a&gt; tahun 2022 yang mengikuti setoran taburukan menghatamkan bil Hifdzi 30 juz selama liburan. &lt;br&gt;Setelah wisuda dari jenjang tingkat MTs, ananda menghabiskan liburan di &lt;a href=\&quot;https://www.facebook.com/ppatq.raudlatulfalah?__cft__[0]=AZWmEGvF2tNaWiMW6VjFh7lJQnuWtb4R-t3cygr1wPFQbXVMVC9B4-_1RNoUJWz3ttAj1uNMs8Y549iWE8rZaTbUiW3IQy00IucziH-5_H-U-V0hNbY9RrGaIoGMwD8A4-ygNH38zafN0iwicqd4SAYRqHGAeTymQiwyNXzIY06JMHy03mBymli4JudDxGDi7DAU5RZlSKDL0Un2oIdmr5Ck&amp;amp;__tn__=-]K-R\&quot;&gt;Ppatq Raudlatul Falah&lt;/a&gt; . Kurang lebih tiga minggu tabarukan setoran Alhamdulillah pagi ini hatam.&amp;nbsp;&lt;br&gt;Selain ini merupakan bentuk menjaga hafalan saat liburan, kegiatan ini bagi alumni juga ajang silaturahim menjaga ta&#039;alluq (Menjalin Hubungan) antara murid dan gurunya.&lt;br&gt;Ta&#039;alluq ini disebut ta&#039;alluq dhohiron artinya selalu terjadi interaksi langsung di antara murid dan gurunya, baik di masa-masa si murid masih menjadi siswa santri aktif ataupun sesudah ia lulus. Ta&#039;alluq dhohiron sesudah di wisuda bisa terjadi, yaitu saat ada kegiatan reuni-reuni atau sejenisnya, semisal tabarukan khataman seperti ini.&amp;nbsp;&lt;br&gt;Kami persilahkan bagi alumni lainnya yang ingin tabarukan khataman pada Abah Shokhib saat jeda liburan untuk bersilaturahim ke pondok, insyaallah full barokah. Syukur-syukur bisa khataman sebagaimana Mas Syaiful.&lt;/div&gt;&quot;
            },
            {
                &quot;judul&quot;: &quot;Hatam Hafalan 30 Juz Lewat Tes Harian Abah KH. Noor Shokhib&quot;,
                &quot;thumbnail&quot;: &quot;20250616101410507111374_2750619238472791_7436639759052346111_n.jpg&quot;,
                &quot;gambar_dalam&quot;: &quot;20250616101410507111374_2750619238472791_7436639759052346111_n.jpg&quot;,
                &quot;isi_berita&quot;: &quot;&lt;div&gt;&lt;br&gt;Khotmil Qur&#039;an &lt;br&gt;Hatam Hafalan 30 Juz Lewat Tes Harian Abah KH. Noor Shokhib&lt;br&gt;______________________&lt;br&gt;&amp;nbsp;Selamat dan Semoga Berkah&lt;br&gt;Semoga menjadi Hafidzoh yang Amali &lt;br&gt;Pagi tadi kembali ada yang hatam 30 juz lewat tes harian Abah Shokhib santriyah atas nama :&lt;br&gt;&amp;nbsp;Ubaidah Sholihah&lt;br&gt;Binti : Bp. H. Fudhli&lt;br&gt;Asal : Batang&lt;br&gt;Kelompok halaqoh : Ustd. Umi Salamah, Alh&lt;br&gt;Mulai setoran : Juni 2019&lt;br&gt;Haflah tahun : 2024&lt;br&gt;Adinda merupakan alumni &lt;a href=\&quot;https://www.facebook.com/PPATQRF?__cft__[0]=AZXefAIXJBVobwd3XkarmfymIedK5F19O2UitUL--BZz6EHp1cFXnoa4asamlmhkG76cHgv3MzhBJuA6u-3Os3z2U0p3_fLTaJnGriRcjLscwkvknGqCIMlukC20zpN3xhtQ82w_IzdnP1ngeERGSGGXQ-j9DcbTu3ITTRvmGlPPuKYphqcq2RIT5QWLfn2x454kzL-liLaKGv1Z69BiToWl&amp;amp;__tn__=-]K-R\&quot;&gt;Pondok Pesantren Anak-anak Tahfidzul Qur&#039;an Raudlatul Falah&lt;/a&gt; dan &lt;a href=\&quot;https://www.facebook.com/mitq.raudlatulfalah?__cft__[0]=AZXefAIXJBVobwd3XkarmfymIedK5F19O2UitUL--BZz6EHp1cFXnoa4asamlmhkG76cHgv3MzhBJuA6u-3Os3z2U0p3_fLTaJnGriRcjLscwkvknGqCIMlukC20zpN3xhtQ82w_IzdnP1ngeERGSGGXQ-j9DcbTu3ITTRvmGlPPuKYphqcq2RIT5QWLfn2x454kzL-liLaKGv1Z69BiToWl&amp;amp;__tn__=-]K-R\&quot;&gt;Mitq Raudlatul Falah&lt;/a&gt; yang mengikuti setoran taburukan menghatamkan bil Hifdzi 30 juz.&amp;nbsp;&lt;br&gt;Semoga menjadi motivasi bagi santri-santriyah yang lain.&lt;/div&gt;&quot;
            }
        ],
        &quot;first_page_url&quot;: &quot;http://api-ppatq.test/api/berita?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 171,
        &quot;last_page_url&quot;: &quot;http://api-ppatq.test/api/berita?page=171&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=4&quot;,
                &quot;label&quot;: &quot;4&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=5&quot;,
                &quot;label&quot;: &quot;5&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=6&quot;,
                &quot;label&quot;: &quot;6&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=7&quot;,
                &quot;label&quot;: &quot;7&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=8&quot;,
                &quot;label&quot;: &quot;8&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=9&quot;,
                &quot;label&quot;: &quot;9&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=10&quot;,
                &quot;label&quot;: &quot;10&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;...&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=170&quot;,
                &quot;label&quot;: &quot;170&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=171&quot;,
                &quot;label&quot;: &quot;171&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/berita?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: &quot;http://api-ppatq.test/api/berita?page=2&quot;,
        &quot;path&quot;: &quot;http://api-ppatq.test/api/berita&quot;,
        &quot;per_page&quot;: 5,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 5,
        &quot;total&quot;: 855
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-berita" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-berita"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-berita"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-berita" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-berita">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-berita" data-method="GET"
      data-path="api/berita"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-berita', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-berita"
                    onclick="tryItOut('GETapi-berita');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-berita"
                    onclick="cancelTryOut('GETapi-berita');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-berita"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/berita</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-berita"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-berita"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-berita"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-dakwah">GET api/dakwah</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-dakwah">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/dakwah" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/dakwah"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dakwah">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 51
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;judul&quot;: &quot;Judul Dakwah (test)&quot;,
                &quot;isi_dakwah&quot;: &quot;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit consectetur expedita earum adipisci dicta nemo esse corrupti voluptate debitis. Doloremque voluptate distinctio beatae repellendus aut! Quae dicta nihil eius eum.&quot;,
                &quot;created_at&quot;: &quot;2025-06-07 17:54:04&quot;
            }
        ],
        &quot;first_page_url&quot;: &quot;http://api-ppatq.test/api/dakwah?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;last_page_url&quot;: &quot;http://api-ppatq.test/api/dakwah?page=1&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/dakwah?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: null,
        &quot;path&quot;: &quot;http://api-ppatq.test/api/dakwah&quot;,
        &quot;per_page&quot;: 5,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 1,
        &quot;total&quot;: 1
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dakwah" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dakwah"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dakwah"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-dakwah" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dakwah">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-dakwah" data-method="GET"
      data-path="api/dakwah"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dakwah', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dakwah"
                    onclick="tryItOut('GETapi-dakwah');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dakwah"
                    onclick="cancelTryOut('GETapi-dakwah');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dakwah"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dakwah</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-dakwah"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-dakwah"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-dakwah"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-agenda">GET api/agenda</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-agenda">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/agenda" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/agenda"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-agenda">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 50
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;judul&quot;: &quot;Liburan Tengan Tahun&quot;,
                &quot;tanggal_mulai&quot;: &quot;2025-12-14 00:00:00&quot;,
                &quot;tanggal_selesai&quot;: &quot;2025-12-14 00:00:00&quot;
            },
            {
                &quot;judul&quot;: &quot;Sambangan bersama (tanpa menginap)&quot;,
                &quot;tanggal_mulai&quot;: &quot;2025-11-02 07:00:00&quot;,
                &quot;tanggal_selesai&quot;: &quot;2025-11-02 17:00:00&quot;
            },
            {
                &quot;judul&quot;: &quot;Sambangan bersama Bersamaan Milad PPATQ&quot;,
                &quot;tanggal_mulai&quot;: &quot;2025-09-06 07:00:00&quot;,
                &quot;tanggal_selesai&quot;: &quot;2025-09-06 00:00:00&quot;
            },
            {
                &quot;judul&quot;: &quot;Sambangan Bulan Juli&quot;,
                &quot;tanggal_mulai&quot;: &quot;2025-07-27 00:00:00&quot;,
                &quot;tanggal_selesai&quot;: &quot;2025-07-27 23:59:00&quot;
            },
            {
                &quot;judul&quot;: &quot;Pengantaran Santri Baru 2025&quot;,
                &quot;tanggal_mulai&quot;: &quot;2025-06-22 07:00:00&quot;,
                &quot;tanggal_selesai&quot;: &quot;2025-06-22 18:11:00&quot;
            }
        ],
        &quot;first_page_url&quot;: &quot;http://api-ppatq.test/api/agenda?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 12,
        &quot;last_page_url&quot;: &quot;http://api-ppatq.test/api/agenda?page=12&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=4&quot;,
                &quot;label&quot;: &quot;4&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=5&quot;,
                &quot;label&quot;: &quot;5&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=6&quot;,
                &quot;label&quot;: &quot;6&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=7&quot;,
                &quot;label&quot;: &quot;7&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=8&quot;,
                &quot;label&quot;: &quot;8&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=9&quot;,
                &quot;label&quot;: &quot;9&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=10&quot;,
                &quot;label&quot;: &quot;10&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=11&quot;,
                &quot;label&quot;: &quot;11&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=12&quot;,
                &quot;label&quot;: &quot;12&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://api-ppatq.test/api/agenda?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: &quot;http://api-ppatq.test/api/agenda?page=2&quot;,
        &quot;path&quot;: &quot;http://api-ppatq.test/api/agenda&quot;,
        &quot;per_page&quot;: 5,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 5,
        &quot;total&quot;: 58
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-agenda" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-agenda"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agenda"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-agenda" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agenda">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-agenda" data-method="GET"
      data-path="api/agenda"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-agenda', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-agenda"
                    onclick="tryItOut('GETapi-agenda');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-agenda"
                    onclick="cancelTryOut('GETapi-agenda');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-agenda"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/agenda</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-agenda"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-agenda"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-agenda"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-about">GET api/about</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-about">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/about" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/about"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-about">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 49
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: {
        &quot;tentang&quot;: &quot;&lt;div&gt;Pesantren &lt;em&gt;PPATQ Raudlatul Falah &lt;/em&gt;berdiri di atas lahan yang luas dan asri, berlokasi di Pati, Jawa Tengah. Dikenal sebagai lembaga pendidikan Islam yang berfokus pada pembentukan generasi penghafal Al-Qur&#039;an, pesantren ini telah memberikan kontribusi signifikan dalam pembangunan sumber daya manusia di bidang keagamaan serta pengembangan ilmu pengetahuan, dengan tetap berpegang teguh kepada Al-Qur&#039;an dan as-Sunnah sebagai pedoman utama.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Jenjang pendidikan Pesantren &lt;em&gt;PPATQ Raudlatul Falah&lt;/em&gt; mulai dari tingkat dasar hingga menengah, dengan fokus utama pada program tahfidzul Qur&#039;an. Kurikulum yang digunakan merupakan perpaduan antara Kurikulum Pendidikan Nasional dan Kurikulum Kepesantrenan.&lt;/div&gt;&quot;,
        &quot;visi&quot;: &quot;&lt;div&gt;\&quot;Bersama QU\&quot;, Komitmen untuk membangun sebuah komunitas yang dijiwai oleh nilai-nilai keimanan dan keislaman yang kokoh. Visi ini mencerminkan tekad untuk bersama-sama menjalani kehidupan dengan bertaqwa kepada Allah, menjunjung tinggi nilai-nilai kesantunan dalam berinteraksi, berjuang untuk kemajuan yang berkelanjutan, dan menghidupkan Al-Qur&#039;an sebagai pedoman utama dalam segala aspek kehidupan.&lt;/div&gt;&quot;,
        &quot;misi&quot;: &quot;&lt;div&gt;\&quot;Misi kami adalah menghasilkan generasi yang hafal Al-Qur&#039;an dengan mutu yang unggul, bukan hanya sekedar dalam hafalan, tetapi juga dalam pemahaman dan aplikasi nilai-nilai Al-Qur&#039;an dalam kehidupan sehari-hari. Kami berkomitmen untuk mencetak generasi yang tidak hanya cemerlang dalam akademik, tetapi juga memiliki karakter yang terkait erat dengan ajaran Al-Qur&#039;an. Kami bertekad untuk meningkatkan mutu imtaq (keimanan) dan iptek (ilmu pengetahuan dan teknologi) dalam pendidikan, serta menegakkan ahlakul karimah sebagai landasan moral dan etika dalam bermasyarakat.\&quot;&lt;/div&gt;&quot;,
        &quot;alamat&quot;: &quot;Jl. KH. Abdullah Km. 02, Kec. Gembong, Kabupaten Pati, Jawa Tengah 59162&quot;,
        &quot;sekolah&quot;: &quot;MI Tahfidzul Qur&rsquo;an Raudlatul Falah&quot;,
        &quot;nsm&quot;: &quot;111233180196&quot;,
        &quot;npsn&quot;: &quot;69727500&quot;,
        &quot;nara_hubung&quot;: &quot;Ust Muslim, AH&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-about" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-about"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-about"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-about" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-about">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-about" data-method="GET"
      data-path="api/about"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-about', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-about"
                    onclick="tryItOut('GETapi-about');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-about"
                    onclick="cancelTryOut('GETapi-about');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-about"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/about</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-about"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-about"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-about"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-galeri">GET api/galeri</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-galeri">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/galeri" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/galeri"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-galeri">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 48
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: {
        &quot;galeri&quot;: [
            {
                &quot;nama&quot;: &quot;Upacara Rutin&quot;,
                &quot;deskripsi&quot;: &quot;Upacara rutin setiap hari senin&quot;,
                &quot;foto&quot;: &quot;1737863203-upacara.jpeg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Dufan&quot;,
                &quot;deskripsi&quot;: &quot;Zarkasi Santri ke Dufan&quot;,
                &quot;foto&quot;: &quot;1736842436-_(23).jpg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Pasar Ramadhan&quot;,
                &quot;deskripsi&quot;: &quot;Kegiatan jajan di pasar ramadhan&quot;,
                &quot;foto&quot;: &quot;1737863338-pasar-ramadhon.jpeg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Kurban&quot;,
                &quot;deskripsi&quot;: &quot;Kurban dari Santri&quot;,
                &quot;foto&quot;: &quot;1736842691-_(12).jpg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Pemeriksaan Gigi&quot;,
                &quot;deskripsi&quot;: &quot;Kegiatan Rutin bulanan pemeriksaan gigi&quot;,
                &quot;foto&quot;: &quot;1737863142-gigi.jpeg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Belajar&quot;,
                &quot;deskripsi&quot;: &quot;Belajar didalam kelas&quot;,
                &quot;foto&quot;: &quot;1737863379-ruang-kelas.jpeg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Tahfidz&quot;,
                &quot;deskripsi&quot;: &quot;Santri Tahfidzan&quot;,
                &quot;foto&quot;: &quot;1736842535-_(20).jpg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Ngaji Kitab&quot;,
                &quot;deskripsi&quot;: &quot;Setiap kamis ngaji kitab \&quot;Taisyrul Kholaq\&quot;&quot;,
                &quot;foto&quot;: &quot;1737862809-bandongan-(ngaji-kitab).jpeg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Khotimin&quot;,
                &quot;deskripsi&quot;: &quot;Bersama KH. Ulil Albab Arwani, AH&quot;,
                &quot;foto&quot;: &quot;1737863048-khotimin.jpeg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Kuliah Umum&quot;,
                &quot;deskripsi&quot;: &quot;Kegiatan di aula serbaguna&quot;,
                &quot;foto&quot;: &quot;1737863248-serbaguna.jpeg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Pengajian&quot;,
                &quot;deskripsi&quot;: null,
                &quot;foto&quot;: &quot;1736842574-_(19).jpg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Ziarah&quot;,
                &quot;deskripsi&quot;: &quot;Ziarah ke makam KH.Arwani&quot;,
                &quot;foto&quot;: &quot;1737863481-ziarah.jpeg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Santri Ujian&quot;,
                &quot;deskripsi&quot;: null,
                &quot;foto&quot;: &quot;1736842774-_(15).jpg&quot;,
                &quot;published&quot;: 1
            },
            {
                &quot;nama&quot;: &quot;Haflah Kotmil&quot;,
                &quot;deskripsi&quot;: null,
                &quot;foto&quot;: &quot;1736842631-_(3).jpg&quot;,
                &quot;published&quot;: 1
            }
        ],
        &quot;fasilitas&quot;: [
            {
                &quot;nama&quot;: &quot;Gedung&quot;,
                &quot;deskripsi&quot;: &quot;Komplek Gedung&quot;,
                &quot;foto&quot;: &quot;1737863639-gedung.jpeg&quot;,
                &quot;published&quot;: 1
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-galeri" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-galeri"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-galeri"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-galeri" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-galeri">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-galeri" data-method="GET"
      data-path="api/galeri"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-galeri', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-galeri"
                    onclick="tryItOut('GETapi-galeri');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-galeri"
                    onclick="cancelTryOut('GETapi-galeri');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-galeri"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/galeri</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-galeri"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-galeri"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-galeri"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-keluhan">POST api/keluhan</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-keluhan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/keluhan" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/keluhan"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-keluhan">
</span>
<span id="execution-results-POSTapi-keluhan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-keluhan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-keluhan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-keluhan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-keluhan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-keluhan" data-method="POST"
      data-path="api/keluhan"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-keluhan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-keluhan"
                    onclick="tryItOut('POSTapi-keluhan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-keluhan"
                    onclick="cancelTryOut('POSTapi-keluhan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-keluhan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/keluhan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-keluhan"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-keluhan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-keluhan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-rekening">GET api/rekening</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-rekening">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/rekening" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/rekening"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-rekening">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 47
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;kodeBank&quot;: &quot;451&quot;,
            &quot;namaBank&quot;: &quot;BANK SYARIAH INDONESIA (BSI)&quot;,
            &quot;noRekening&quot;: &quot;7141299818&quot;,
            &quot;atasNama&quot;: &quot;Ponpes Anak Tahfidul Qur&rsquo;an RF&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-rekening" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-rekening"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-rekening"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-rekening" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-rekening">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-rekening" data-method="GET"
      data-path="api/rekening"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-rekening', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-rekening"
                    onclick="tryItOut('GETapi-rekening');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-rekening"
                    onclick="cancelTryOut('GETapi-rekening');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-rekening"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/rekening</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-rekening"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-rekening"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-rekening"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-tutorial-pembayaran">GET api/tutorial-pembayaran</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-tutorial-pembayaran">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/tutorial-pembayaran" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/tutorial-pembayaran"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-tutorial-pembayaran">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 46
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;urutan&quot;: &quot;1&quot;,
            &quot;jenis&quot;: &quot;pembayaran&quot;,
            &quot;teks&quot;: &quot;&lt;div&gt;Pembayaran syahriah wajib dilakukan pada tanggal 1-10 setiap bulannya.&lt;/div&gt;&quot;
        },
        {
            &quot;id&quot;: null,
            &quot;urutan&quot;: 2,
            &quot;jenis&quot;: &quot;pembayaran&quot;,
            &quot;teks&quot;: &quot;&lt;div&gt;Rekening tujuannya adalah&amp;nbsp;&lt;br&gt;&lt;br&gt;BANK SYARIAH INDONESIA (BSI) kode bank : 451&amp;nbsp;&lt;br&gt;Nomor rekening : 7141299818&lt;br&gt;Nama pemilik rekening : Ponpes Anak Tahfidul Qur&rsquo;an RF&lt;/div&gt;&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;urutan&quot;: &quot;3&quot;,
            &quot;jenis&quot;: &quot;pembayaran&quot;,
            &quot;teks&quot;: &quot;&lt;div&gt;Pembayaran dilakukan dengan cara&lt;br&gt;a. Menyetor biaya pesantren / syahriah ke Rekening dengan cara transfer sebesar uang yang akan dibayarkan dan rincian yang sudah dipersiapkan sebelumnya. Kemudian hasil bayar mohon dilaporkan ke bagian keuangan melalui menu lapor bayar pada aplikasi PPATQ-RF ku. Urutan serta alur sudah tersaji.Tp mohon disiapkan file bukti bayar&lt;br&gt;b. Merencanakan item-item yang akan dibayarkan termasuk tunggakan yang ada, setelahnya akan muncul total rencana bayar.&amp;nbsp; Rincian tersebut akan direkam oleh system dan setelah simpan, maka akan muncul tagih. Dari tagih tersebut silakan ke ATM atau menggunakan pembayaran lainya. Dengan merujuk poin 1 nuliskan akan membayar apa saja, sudah dirinci terlebih dahulu melalui aplikasi mobile PPATQ-RF ku (sedang dalam pengembangan terhubung dengan VA)&lt;/div&gt;&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;urutan&quot;: &quot;4&quot;,
            &quot;jenis&quot;: &quot;pembayaran&quot;,
            &quot;teks&quot;: &quot;&lt;div&gt;Lapor pembayaran baik melalui aplikasi PPATQ-RF ku maupun melalui http://payment.ppatq-rf.id telah dikondisikan selalu mendapatkan balasan respon dalam bentuk WA lengkap dengan informasi.&lt;br&gt;&lt;br&gt;&lt;/div&gt;&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;urutan&quot;: &quot;5&quot;,
            &quot;jenis&quot;: &quot;pembayaran&quot;,
            &quot;teks&quot;: &quot;&lt;div&gt;Lapor bukti bayar ini adalah Upaya memudahkan pemetaan data bayar sesuai dengan keperuntukannya sekaligus double check antara Lembaga pondok dengan wali santri&lt;br&gt;&lt;br&gt;&lt;/div&gt;&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;urutan&quot;: &quot;6&quot;,
            &quot;jenis&quot;: &quot;pembayaran&quot;,
            &quot;teks&quot;: &quot;&lt;div&gt;Uang saku / uang jajan silakan dapat dimonitor pada menu uang saku. Detail pengeluaran dapat dilihat pada menu uang saku keluar dan rincian tersebut berdasarkan inputan dari Murobbi&lt;/div&gt;&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;urutan&quot;: &quot;7&quot;,
            &quot;jenis&quot;: &quot;pembayaran&quot;,
            &quot;teks&quot;: &quot;&lt;div&gt;Layanan informasi : &lt;br&gt;a. Untuk gangguan informasi data bayar / konfirmasi bayar dapat menghubungi &lt;a href=\&quot;https://wa.me/6287767572025\&quot;&gt;0877-6757-2025&lt;/a&gt; dan &lt;br&gt;b. kesulitan teknis Sistem Pelaporan atau aplikasi PPATQ-RF ku silakan hubungi &lt;a href=\&quot;https://wa.me/62818240102\&quot;&gt;0818-24-0102&lt;/a&gt;&lt;/div&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tutorial-pembayaran" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tutorial-pembayaran"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tutorial-pembayaran"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-tutorial-pembayaran" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tutorial-pembayaran">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-tutorial-pembayaran" data-method="GET"
      data-path="api/tutorial-pembayaran"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tutorial-pembayaran', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tutorial-pembayaran"
                    onclick="tryItOut('GETapi-tutorial-pembayaran');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tutorial-pembayaran"
                    onclick="cancelTryOut('GETapi-tutorial-pembayaran');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tutorial-pembayaran"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tutorial-pembayaran</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-tutorial-pembayaran"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-tutorial-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-tutorial-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-tutorial-pembayaran">POST api/tutorial-pembayaran</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-tutorial-pembayaran">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/tutorial-pembayaran" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/tutorial-pembayaran"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-tutorial-pembayaran">
</span>
<span id="execution-results-POSTapi-tutorial-pembayaran" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-tutorial-pembayaran"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-tutorial-pembayaran"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-tutorial-pembayaran" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-tutorial-pembayaran">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-tutorial-pembayaran" data-method="POST"
      data-path="api/tutorial-pembayaran"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-tutorial-pembayaran', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-tutorial-pembayaran"
                    onclick="tryItOut('POSTapi-tutorial-pembayaran');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-tutorial-pembayaran"
                    onclick="cancelTryOut('POSTapi-tutorial-pembayaran');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-tutorial-pembayaran"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/tutorial-pembayaran</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-tutorial-pembayaran"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-tutorial-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-tutorial-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-get-ustadz">GET api/get-ustadz</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-get-ustadz">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/get-ustadz" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/get-ustadz"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-get-ustadz">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 45
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;nama&quot;: &quot;Zahrotun Nafisah, S.Pd.I&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202312050909Usth. Zahrotun Nafisah, S.Pd.I (2).JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Zidni Ilman Nafia, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Imro?atul Khoiriyah, S.Pd.I&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Muslihah&#039;Ainur Rohmah, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082018Usth. Muslihah &#039;Ainur Rohmah, S.Pd.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Atik Millati Hari, S.Pd.I&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311090939Usth. Athie` Millati Hari, S.Pd.I.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Sunaryo, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Nailis Safa?ah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Ahmad Musta?in, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Syaidatun Nafi?ah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311081950Usth. Saidatun Nafi`ah, S.Pd.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Moh Mustaqim&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Mohammad Syarofun Na&#039;im&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz Karyawan&quot;
        },
        {
            &quot;nama&quot;: &quot;Siti Sufiati, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Solikhin, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082319Ust. M. Solikhin, S.Pd.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Ainun Naim&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091049Ust. M. Ainun Naim.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Zulfa Auliyatun Nafisah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202312050908Usth. Zulfa Auliyatun Nafisah, S.Pd.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Latif&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091033Ust. Ahmad Latif.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-Laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz Keamanan&quot;
        },
        {
            &quot;nama&quot;: &quot;Aris Syaifudin, S.Pd.I&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082246Ust. Aris Syaifudin, S.Pd.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Khadirin&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091021Ust. Hadirin.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz Karyawan&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Zaim Asror, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;MUhammad Fatikhul Amin, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        },
        {
            &quot;nama&quot;: &quot;Hesti Susanti, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082035Usth. Hesti Susanti, S.Pd.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Ustadz&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-get-ustadz" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-get-ustadz"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-ustadz"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-get-ustadz" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-ustadz">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-get-ustadz" data-method="GET"
      data-path="api/get-ustadz"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-get-ustadz', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-get-ustadz"
                    onclick="tryItOut('GETapi-get-ustadz');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-get-ustadz"
                    onclick="cancelTryOut('GETapi-get-ustadz');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-get-ustadz"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/get-ustadz</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-get-ustadz"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-get-ustadz"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-get-ustadz"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-get-murroby">GET api/get-murroby</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-get-murroby">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/get-murroby" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/get-murroby"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-get-murroby">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 44
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;nama&quot;: &quot;Ahmad Sya&#039;roni&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091016Ust. Ahmad Sya&#039;roni.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Zulaifa&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311081105WhatsApp Image 2023-11-08 at 10.51.15.jpeg&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Alif Munfarika&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311090942Usth. Alif Munfarika.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Fitriyah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082036Usth. Fitriah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Dedy Verdiansyah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091057Ust. Dedy Ferdiansyah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Fitri Aizatul Aliyah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082036Usth. Fitri Aizatul Aliyah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Ahmad Sholeh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Muhammad Najib&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;MUhammad Miftahul Ulum&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Ahmad Lutfi&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Wanda Hanum Fatmawati&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202312050910Usth. Wanda.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Farah Dyah Ayu Safitri&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082037Usth. Farah Dyah Ayu Safitri.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Sholihul Amri&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Ririn Sulistiowati&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082010Usth. Ririn Sulistiowati.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Putri Din Amartiyah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082010Usth. Putri Din Amartiyah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Umi Nurohmah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202312050918Usth. Umi Nurohmah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Aris Zuliana&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311090939Usth. Aris Zuliana.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Anis Karomatu Dhuha&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311090940Usth. Anis Karomatu Dhuha, S.Pd.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Desti Puspita Sari&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311090938Usth. Desti Puspita Sari, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Anis Wulandari&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Qolbi Atthohir, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Shandi Armansyah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Musfiroh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082019Usth. Musfiroh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Siti Rahmawati&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082003Usth. Siti Rahmawati.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Shohibul Burhan&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311111500user.png&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Lina Ulfatun Nisfah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311081127IMG-20231108-WA0023.jpg&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        },
        {
            &quot;nama&quot;: &quot;Aufa Dzaqok&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Murobby&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-get-murroby" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-get-murroby"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-murroby"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-get-murroby" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-murroby">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-get-murroby" data-method="GET"
      data-path="api/get-murroby"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-get-murroby', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-get-murroby"
                    onclick="tryItOut('GETapi-get-murroby');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-get-murroby"
                    onclick="cancelTryOut('GETapi-get-murroby');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-get-murroby"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/get-murroby</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-get-murroby"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-get-murroby"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-get-murroby"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-get-staff">GET api/get-staff</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-get-staff">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/get-staff" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/get-staff"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-get-staff">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 43
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: [
        {
            &quot;nama&quot;: &quot;MUHAMMAD KHIRZUL ULA , AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Siti Nuryati&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Masak&quot;
        },
        {
            &quot;nama&quot;: &quot;Syamsudin, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Ahmad Zubaidi, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091106Ust. Abdul Fatah, AH.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Nurul Zulfa , Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082011Usth. Nurul Zulfa, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Triana Handayani, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082021Usth. Triana Handayani, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Ahmad Badawi, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Umi Kholifah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311081947Usth. Umi Kholifah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Loundry&quot;
        },
        {
            &quot;nama&quot;: &quot;Siti Mutiah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082006Usth. Siti Muti`ah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Syaidatul Awaliyah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311081952Usth. Syaidatul Awaliyah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Loundry&quot;
        },
        {
            &quot;nama&quot;: &quot;Siti Zubaidah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;2023110820015. Usth. Siti Zubaidah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Abdul Munib, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311111429pexels-pascal-bronsert-18957080 (1).jpg&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Nur Faidah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082013Usth. Nur Faidah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Kebersihan&quot;
        },
        {
            &quot;nama&quot;: &quot;Alifaturrobi&rsquo;ah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Sri Fathonah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082000Usth. Sri Fatonah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Masak&quot;
        },
        {
            &quot;nama&quot;: &quot;Mohdhorin, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Abdul Fatah, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Abdul Jalil Nurusshobah, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Nailur Rifda, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082016Usth. Nailurrifda, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Nur Kholis, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Ali Mahrus, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091105Ust. Ali Mahrus, AH.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Muhammad Afifi, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-Laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Muslim, AH, S.Pd.I&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082321Ust. M. Muslim, AH, S.Pd.I.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Dyah Nafisatul Aulia, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311090937Usth. Dyah Nafisatul Aulia, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Umi Salamah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202312050916Usth. Umi Salamah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Jumaatin&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082031Usth. Jumaatin.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Loundry&quot;
        },
        {
            &quot;nama&quot;: &quot;Nur Hasanah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082012Usth. Nur Hasanah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Hariyanto, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091035Ust. Haryanto, AH.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Kustiyani&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082027Usth. Kustiyani.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Masak&quot;
        },
        {
            &quot;nama&quot;: &quot;Siti Qona&#039;ah , Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082004Usth. Siti Qona&#039;ah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Ulul Albab, AH, S.Pd.I&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082317Ust. M. Ulul Albab, AH, S.Pd.I.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Erlin Nurhayati&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;UKS&quot;
        },
        {
            &quot;nama&quot;: &quot;Lia Mukaromah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082029Usth. Lia Mukaromah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Kebersihan&quot;
        },
        {
            &quot;nama&quot;: &quot;Sriati, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311081954Usth. Sriati, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Yasniti Nur Wahid, Alh, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;2023120509142. Usth. Hj. Yasniti Nor Wahid, Alh., S.Pd.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Erni Mustafiani, A.Md.Keb&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311090931Usth. Erni Mustafiani, A.Md. Keb.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;UKS&quot;
        },
        {
            &quot;nama&quot;: &quot;Suparti&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311081945Usth. Suparti.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Kebersihan&quot;
        },
        {
            &quot;nama&quot;: &quot;Sufiati, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311081953Usth. Sufiati, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Mudhorin, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Muh. Iqbal Rizqi Farihatsamara , AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Nur Hikmah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Sumini, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202312050921Usth. Sumini, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Moh Yasin, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Aindun Naisyah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311090943Usth. Aindun Naisyah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Kebersihan&quot;
        },
        {
            &quot;nama&quot;: &quot;Joko Muiz Syaifuddin, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091052Ust. Joko Muiz Syaifuddin, AH.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Runiati&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082009Usth. Runiati.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Masak&quot;
        },
        {
            &quot;nama&quot;: &quot;Agus Ahmad Miftahul Yusuf, AH, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Yusrul Hana, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082313Ust. M. Yusrul Hana, AH.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Uswatun Hasanah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202312050911Usth. Uswatun Hasanah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Siti Saudah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082002Usth. Siti Saudah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Kebersihan&quot;
        },
        {
            &quot;nama&quot;: &quot;Riska Wahyuni,Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082008Usth. Riska Wahyuni, Alh.jpg&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Muhadi, AH, S.Pd&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Abdul Ghofur,AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091021Ust. Abdul Ghofur, AH.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Nafsiyah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;2023110819446. Usth. Nafsiyah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Irsyadul Ibad, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091022Ust. Irysadul Ibad, AH.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Kholifah Amirul Mu&#039;minin&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082028Usth. Kholifah Amirul Mu&#039;minin.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Kebersihan&quot;
        },
        {
            &quot;nama&quot;: &quot;Nor Hidayah,Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082013Usth. Nor Hidayah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Endang Setiyo Wati, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Samsudin, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Niswatin Nada, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;2023110820153. Usth. Niswatin Nada, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Istiani, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082030Usth. Istiyani, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Imroatus Sholihah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082032Usth. Imro`atus Sholikhah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Ahmad Khoiri, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Tiana, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Listi&#039;adah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;2023110820257. Usth. Listi&#039;adah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Nor Azizah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082014Usth. Nor Azizah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Loundry&quot;
        },
        {
            &quot;nama&quot;: &quot;Mufatihah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082021Usth. Mufatihah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Loundry&quot;
        },
        {
            &quot;nama&quot;: &quot;Lulu&#039;il Maftuchah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082025Usth. Lulu&#039;il Maftuchah, Alh.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Sri Wahyuni&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311081956Usth. Sri Wahyuni.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Kebersihan&quot;
        },
        {
            &quot;nama&quot;: &quot;Turmudzi, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Mustiah, Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Hj. Isti?adah, Alh, S.Pd.I&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082034..JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Ulil Muna Rofiqurrohman, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Uways Al Qorni, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: null,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Faihsol&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091047Ust. Muhammad Faishol.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Falikhah,Alh&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Ahmad Lutfi Hakim, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;M. Ulurrosyad, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311091020Ust. M. Ulurrosyad, AH.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Sukirno, AH&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;&quot;,
            &quot;jenis_kelamin&quot;: &quot;Laki-laki&quot;,
            &quot;jabatan&quot;: &quot;Tahfidz&quot;
        },
        {
            &quot;nama&quot;: &quot;Naila Fitri Istafita&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082018Usth. Naila Fitri Istafida.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Loundry&quot;
        },
        {
            &quot;nama&quot;: &quot;Siti Qomariah&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082004Usth. Siti Qomariyah.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Loundry&quot;
        },
        {
            &quot;nama&quot;: &quot;Shofiatun&quot;,
            &quot;alhafidz&quot;: 0,
            &quot;photo&quot;: &quot;202311082007Usth. Shofiatun.JPG&quot;,
            &quot;jenis_kelamin&quot;: &quot;Perempuan&quot;,
            &quot;jabatan&quot;: &quot;Masak&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-get-staff" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-get-staff"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-staff"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-get-staff" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-staff">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-get-staff" data-method="GET"
      data-path="api/get-staff"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-get-staff', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-get-staff"
                    onclick="tryItOut('GETapi-get-staff');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-get-staff"
                    onclick="cancelTryOut('GETapi-get-staff');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-get-staff"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/get-staff</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-get-staff"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-get-staff"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-get-staff"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-kesantrian">GET api/kesantrian</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-kesantrian">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/kesantrian" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/kesantrian"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kesantrian">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 42
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: {
        &quot;santriAktif&quot;: {
            &quot;current_page&quot;: 1,
            &quot;data&quot;: [
                {
                    &quot;nama&quot;: &quot;Muhammad Zafran Alwi&quot;,
                    &quot;photo&quot;: null,
                    &quot;kelas&quot;: &quot;1a&quot;,
                    &quot;kecamatan&quot;: &quot;Tanjung Priok&quot;,
                    &quot;kamar_employee_id&quot;: 33,
                    &quot;kelas_employee_id&quot;: 11,
                    &quot;guru_murroby&quot;: &quot;Aufa Dzaqok&quot;,
                    &quot;wali_kelas&quot;: &quot;Ahmad Musta?in, S.Pd&quot;
                },
                {
                    &quot;nama&quot;: &quot;Zahra Ashiila Rahma&quot;,
                    &quot;photo&quot;: &quot;202312081030IMG_2265.JPG&quot;,
                    &quot;kelas&quot;: &quot;6b&quot;,
                    &quot;kecamatan&quot;: &quot;Klambu&quot;,
                    &quot;kamar_employee_id&quot;: 120,
                    &quot;kelas_employee_id&quot;: 97,
                    &quot;guru_murroby&quot;: &quot;Wanda Hanum Fatmawati&quot;,
                    &quot;wali_kelas&quot;: &quot;Imro?atul Khoiriyah, S.Pd.I&quot;
                },
                {
                    &quot;nama&quot;: &quot;Ghilman Jabbar Al-Kaff&quot;,
                    &quot;photo&quot;: null,
                    &quot;kelas&quot;: &quot;1a&quot;,
                    &quot;kecamatan&quot;: &quot;Kerek&quot;,
                    &quot;kamar_employee_id&quot;: 147,
                    &quot;kelas_employee_id&quot;: 11,
                    &quot;guru_murroby&quot;: &quot;Qolbi Atthohir, AH&quot;,
                    &quot;wali_kelas&quot;: &quot;Ahmad Musta?in, S.Pd&quot;
                },
                {
                    &quot;nama&quot;: &quot;Silvina Esma En Najwa&quot;,
                    &quot;photo&quot;: null,
                    &quot;kelas&quot;: &quot;1b&quot;,
                    &quot;kecamatan&quot;: &quot;Rengel&quot;,
                    &quot;kamar_employee_id&quot;: 120,
                    &quot;kelas_employee_id&quot;: 77,
                    &quot;guru_murroby&quot;: &quot;Wanda Hanum Fatmawati&quot;,
                    &quot;wali_kelas&quot;: &quot;Zulfa Auliyatun Nafisah&quot;
                }
            ],
            &quot;first_page_url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=1&quot;,
            &quot;from&quot;: 1,
            &quot;last_page&quot;: 180,
            &quot;last_page_url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=180&quot;,
            &quot;links&quot;: [
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=1&quot;,
                    &quot;label&quot;: &quot;1&quot;,
                    &quot;active&quot;: true
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=2&quot;,
                    &quot;label&quot;: &quot;2&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=3&quot;,
                    &quot;label&quot;: &quot;3&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=4&quot;,
                    &quot;label&quot;: &quot;4&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=5&quot;,
                    &quot;label&quot;: &quot;5&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=6&quot;,
                    &quot;label&quot;: &quot;6&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=7&quot;,
                    &quot;label&quot;: &quot;7&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=8&quot;,
                    &quot;label&quot;: &quot;8&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=9&quot;,
                    &quot;label&quot;: &quot;9&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=10&quot;,
                    &quot;label&quot;: &quot;10&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;...&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=179&quot;,
                    &quot;label&quot;: &quot;179&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=180&quot;,
                    &quot;label&quot;: &quot;180&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=2&quot;,
                    &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                    &quot;active&quot;: false
                }
            ],
            &quot;next_page_url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=2&quot;,
            &quot;path&quot;: &quot;http://api-ppatq.test/api/kesantrian&quot;,
            &quot;per_page&quot;: 4,
            &quot;prev_page_url&quot;: null,
            &quot;to&quot;: 4,
            &quot;total&quot;: 718
        },
        &quot;santriAlumni&quot;: {
            &quot;current_page&quot;: 1,
            &quot;data&quot;: [
                {
                    &quot;id&quot;: 71,
                    &quot;no_induk&quot;: 634,
                    &quot;nama&quot;: &quot;Yulia Fajar Nafisah&quot;,
                    &quot;nisn&quot;: null,
                    &quot;nik&quot;: &quot;&quot;,
                    &quot;anak_ke&quot;: null,
                    &quot;tempat_lahir&quot;: &quot;Demak&quot;,
                    &quot;tanggal_lahir&quot;: &quot;2012-07-09&quot;,
                    &quot;usia&quot;: null,
                    &quot;jenis_kelamin&quot;: &quot;P&quot;,
                    &quot;alamat&quot;: &quot;Brumbung&quot;,
                    &quot;kelurahan&quot;: &quot;Brumbung&quot;,
                    &quot;kecamatan&quot;: &quot;Mranggen&quot;,
                    &quot;kabkota&quot;: 199,
                    &quot;provinsi&quot;: 13,
                    &quot;kode_pos&quot;: &quot;59567&quot;,
                    &quot;nik_kk&quot;: &quot;3321012602080010&quot;,
                    &quot;nama_lengkap_ayah&quot;: &quot;Agus Santoso&quot;,
                    &quot;pendidikan_ayah&quot;: &quot;slta&quot;,
                    &quot;pekerjaan_ayah&quot;: &quot;karyawan Swasta&quot;,
                    &quot;nama_lengkap_ibu&quot;: &quot;Anita Puji Astutik&quot;,
                    &quot;pendidikan_ibu&quot;: &quot;slta&quot;,
                    &quot;pekerjaan_ibu&quot;: &quot;karyawan&quot;,
                    &quot;no_hp&quot;: &quot;08529074****&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: &quot;2024-01-03 23:56:19&quot;,
                    &quot;no_tes&quot;: null,
                    &quot;kelas&quot;: &quot;6b&quot;,
                    &quot;kamar_id&quot;: 30,
                    &quot;tahfidz_id&quot;: 0,
                    &quot;photo&quot;: &quot;202312051105IMG_7045.JPG&quot;,
                    &quot;photo_location&quot;: 2,
                    &quot;deleted_at&quot;: null,
                    &quot;status&quot;: 0,
                    &quot;tahun_lulus&quot;: null,
                    &quot;tahun_msk_mi&quot;: null,
                    &quot;nama_pondok_mi&quot;: null,
                    &quot;tahun_msk_pondok_mi&quot;: null,
                    &quot;thn_msk_menengah&quot;: null,
                    &quot;nama_sekolah_menengah_pertama&quot;: null,
                    &quot;nama_pondok_menengah_pertama&quot;: null,
                    &quot;tahun_msk_menengah_atas&quot;: null,
                    &quot;nama_menengah_atas&quot;: null,
                    &quot;nama_pondok_menengah_atas&quot;: null,
                    &quot;tahun_msk_pt&quot;: null,
                    &quot;nama_pt&quot;: null,
                    &quot;nama_pondok_pt&quot;: null,
                    &quot;tahun_msk_profesi&quot;: null,
                    &quot;nama_perusahaan&quot;: null,
                    &quot;bidang_profesi&quot;: null,
                    &quot;posisi_profesi&quot;: null,
                    &quot;kamar_employee_id&quot;: 120,
                    &quot;kelas_employee_id&quot;: 97,
                    &quot;guru_murroby&quot;: &quot;Wanda Hanum Fatmawati&quot;,
                    &quot;wali_kelas&quot;: &quot;Imro?atul Khoiriyah, S.Pd.I&quot;,
                    &quot;angkatan&quot;: null
                },
                {
                    &quot;id&quot;: 123,
                    &quot;no_induk&quot;: 781,
                    &quot;nama&quot;: &quot;Mohammad Andika Praba Maheswara&quot;,
                    &quot;nisn&quot;: &quot;0125977773&quot;,
                    &quot;nik&quot;: &quot;3315153010120002&quot;,
                    &quot;anak_ke&quot;: 4,
                    &quot;tempat_lahir&quot;: &quot;grobogan&quot;,
                    &quot;tanggal_lahir&quot;: &quot;2012-10-30&quot;,
                    &quot;usia&quot;: null,
                    &quot;jenis_kelamin&quot;: &quot;L&quot;,
                    &quot;alamat&quot;: &quot;ds Ploso&quot;,
                    &quot;kelurahan&quot;: &quot;Kandangrejo&quot;,
                    &quot;kecamatan&quot;: &quot;Klambu&quot;,
                    &quot;kabkota&quot;: 197,
                    &quot;provinsi&quot;: 13,
                    &quot;kode_pos&quot;: &quot;58154&quot;,
                    &quot;nik_kk&quot;: &quot;3315151807070042&quot;,
                    &quot;nama_lengkap_ayah&quot;: &quot;Gunawan&quot;,
                    &quot;pendidikan_ayah&quot;: &quot;sltp&quot;,
                    &quot;pekerjaan_ayah&quot;: &quot;wiraswasta&quot;,
                    &quot;nama_lengkap_ibu&quot;: &quot;Lilis Noviasari&quot;,
                    &quot;pendidikan_ibu&quot;: null,
                    &quot;pekerjaan_ibu&quot;: &quot;mrt&quot;,
                    &quot;no_hp&quot;: &quot;08138195****&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: &quot;2024-12-09 19:53:53&quot;,
                    &quot;no_tes&quot;: null,
                    &quot;kelas&quot;: &quot;6a&quot;,
                    &quot;kamar_id&quot;: 15,
                    &quot;tahfidz_id&quot;: 8,
                    &quot;photo&quot;: &quot;202412091953Mohammad Andika Praba Maheswara Alamat Grobogan.JPG&quot;,
                    &quot;photo_location&quot;: 2,
                    &quot;deleted_at&quot;: null,
                    &quot;status&quot;: 0,
                    &quot;tahun_lulus&quot;: 2025,
                    &quot;tahun_msk_mi&quot;: null,
                    &quot;nama_pondok_mi&quot;: null,
                    &quot;tahun_msk_pondok_mi&quot;: null,
                    &quot;thn_msk_menengah&quot;: null,
                    &quot;nama_sekolah_menengah_pertama&quot;: null,
                    &quot;nama_pondok_menengah_pertama&quot;: null,
                    &quot;tahun_msk_menengah_atas&quot;: null,
                    &quot;nama_menengah_atas&quot;: null,
                    &quot;nama_pondok_menengah_atas&quot;: null,
                    &quot;tahun_msk_pt&quot;: null,
                    &quot;nama_pt&quot;: null,
                    &quot;nama_pondok_pt&quot;: null,
                    &quot;tahun_msk_profesi&quot;: null,
                    &quot;nama_perusahaan&quot;: null,
                    &quot;bidang_profesi&quot;: null,
                    &quot;posisi_profesi&quot;: null,
                    &quot;kamar_employee_id&quot;: 33,
                    &quot;kelas_employee_id&quot;: 30,
                    &quot;guru_murroby&quot;: &quot;Aufa Dzaqok&quot;,
                    &quot;wali_kelas&quot;: &quot;M. Solikhin, S.Pd&quot;,
                    &quot;angkatan&quot;: null
                },
                {
                    &quot;id&quot;: 151,
                    &quot;no_induk&quot;: 718,
                    &quot;nama&quot;: &quot;Atania Nisrina Tsalitsah&quot;,
                    &quot;nisn&quot;: &quot;0124325918&quot;,
                    &quot;nik&quot;: &quot;3315116105120001&quot;,
                    &quot;anak_ke&quot;: 1,
                    &quot;tempat_lahir&quot;: &quot;Grobogan&quot;,
                    &quot;tanggal_lahir&quot;: &quot;2012-05-21&quot;,
                    &quot;usia&quot;: null,
                    &quot;jenis_kelamin&quot;: &quot;P&quot;,
                    &quot;alamat&quot;: &quot;Plumbungan&quot;,
                    &quot;kelurahan&quot;: &quot;Jono&quot;,
                    &quot;kecamatan&quot;: &quot;Tawangharjo&quot;,
                    &quot;kabkota&quot;: 197,
                    &quot;provinsi&quot;: 13,
                    &quot;kode_pos&quot;: &quot;58191&quot;,
                    &quot;nik_kk&quot;: &quot;3315111505090002&quot;,
                    &quot;nama_lengkap_ayah&quot;: &quot;Rohmi Abd Halim&quot;,
                    &quot;pendidikan_ayah&quot;: &quot;slta&quot;,
                    &quot;pekerjaan_ayah&quot;: &quot;TNI&quot;,
                    &quot;nama_lengkap_ibu&quot;: &quot;Siti Ulfiyah&quot;,
                    &quot;pendidikan_ibu&quot;: &quot;slta&quot;,
                    &quot;pekerjaan_ibu&quot;: &quot;mrt&quot;,
                    &quot;no_hp&quot;: &quot;08233572****&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: &quot;2024-10-01 16:56:12&quot;,
                    &quot;no_tes&quot;: null,
                    &quot;kelas&quot;: &quot;6b&quot;,
                    &quot;kamar_id&quot;: 30,
                    &quot;tahfidz_id&quot;: 63,
                    &quot;photo&quot;: &quot;202312051045IMG_8387.JPG&quot;,
                    &quot;photo_location&quot;: 2,
                    &quot;deleted_at&quot;: null,
                    &quot;status&quot;: 0,
                    &quot;tahun_lulus&quot;: 2025,
                    &quot;tahun_msk_mi&quot;: null,
                    &quot;nama_pondok_mi&quot;: null,
                    &quot;tahun_msk_pondok_mi&quot;: null,
                    &quot;thn_msk_menengah&quot;: null,
                    &quot;nama_sekolah_menengah_pertama&quot;: null,
                    &quot;nama_pondok_menengah_pertama&quot;: null,
                    &quot;tahun_msk_menengah_atas&quot;: null,
                    &quot;nama_menengah_atas&quot;: null,
                    &quot;nama_pondok_menengah_atas&quot;: null,
                    &quot;tahun_msk_pt&quot;: null,
                    &quot;nama_pt&quot;: null,
                    &quot;nama_pondok_pt&quot;: null,
                    &quot;tahun_msk_profesi&quot;: null,
                    &quot;nama_perusahaan&quot;: null,
                    &quot;bidang_profesi&quot;: null,
                    &quot;posisi_profesi&quot;: null,
                    &quot;kamar_employee_id&quot;: 120,
                    &quot;kelas_employee_id&quot;: 97,
                    &quot;guru_murroby&quot;: &quot;Wanda Hanum Fatmawati&quot;,
                    &quot;wali_kelas&quot;: &quot;Imro?atul Khoiriyah, S.Pd.I&quot;,
                    &quot;angkatan&quot;: null
                },
                {
                    &quot;id&quot;: 37,
                    &quot;no_induk&quot;: 686,
                    &quot;nama&quot;: &quot;Taufiqy Muhammad Zain&quot;,
                    &quot;nisn&quot;: null,
                    &quot;nik&quot;: null,
                    &quot;anak_ke&quot;: null,
                    &quot;tempat_lahir&quot;: &quot;Demak&quot;,
                    &quot;tanggal_lahir&quot;: &quot;2012-02-01&quot;,
                    &quot;usia&quot;: null,
                    &quot;jenis_kelamin&quot;: &quot;L&quot;,
                    &quot;alamat&quot;: &quot;PR Patah Blok 01&quot;,
                    &quot;kelurahan&quot;: &quot;Sri Wulan&quot;,
                    &quot;kecamatan&quot;: &quot;Sayung&quot;,
                    &quot;kabkota&quot;: 199,
                    &quot;provinsi&quot;: 13,
                    &quot;kode_pos&quot;: &quot;59563&quot;,
                    &quot;nik_kk&quot;: &quot;3321041503070034&quot;,
                    &quot;nama_lengkap_ayah&quot;: &quot;Moch Jasuli&quot;,
                    &quot;pendidikan_ayah&quot;: &quot;slta&quot;,
                    &quot;pekerjaan_ayah&quot;: &quot;tukang cukur&quot;,
                    &quot;nama_lengkap_ibu&quot;: &quot;Nur Aini&quot;,
                    &quot;pendidikan_ibu&quot;: &quot;slta&quot;,
                    &quot;pekerjaan_ibu&quot;: &quot;mrt&quot;,
                    &quot;no_hp&quot;: &quot;08783371****&quot;,
                    &quot;created_at&quot;: null,
                    &quot;updated_at&quot;: &quot;2023-10-10 20:21:48&quot;,
                    &quot;no_tes&quot;: null,
                    &quot;kelas&quot;: &quot;6a&quot;,
                    &quot;kamar_id&quot;: 16,
                    &quot;tahfidz_id&quot;: 0,
                    &quot;photo&quot;: &quot;&quot;,
                    &quot;photo_location&quot;: 0,
                    &quot;deleted_at&quot;: null,
                    &quot;status&quot;: 0,
                    &quot;tahun_lulus&quot;: null,
                    &quot;tahun_msk_mi&quot;: null,
                    &quot;nama_pondok_mi&quot;: null,
                    &quot;tahun_msk_pondok_mi&quot;: null,
                    &quot;thn_msk_menengah&quot;: null,
                    &quot;nama_sekolah_menengah_pertama&quot;: null,
                    &quot;nama_pondok_menengah_pertama&quot;: null,
                    &quot;tahun_msk_menengah_atas&quot;: null,
                    &quot;nama_menengah_atas&quot;: null,
                    &quot;nama_pondok_menengah_atas&quot;: null,
                    &quot;tahun_msk_pt&quot;: null,
                    &quot;nama_pt&quot;: null,
                    &quot;nama_pondok_pt&quot;: null,
                    &quot;tahun_msk_profesi&quot;: null,
                    &quot;nama_perusahaan&quot;: null,
                    &quot;bidang_profesi&quot;: null,
                    &quot;posisi_profesi&quot;: null,
                    &quot;kamar_employee_id&quot;: 22,
                    &quot;kelas_employee_id&quot;: 30,
                    &quot;guru_murroby&quot;: &quot;M. Ainun Naim&quot;,
                    &quot;wali_kelas&quot;: &quot;M. Solikhin, S.Pd&quot;,
                    &quot;angkatan&quot;: null
                }
            ],
            &quot;first_page_url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=1&quot;,
            &quot;from&quot;: 1,
            &quot;last_page&quot;: 41,
            &quot;last_page_url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=41&quot;,
            &quot;links&quot;: [
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=1&quot;,
                    &quot;label&quot;: &quot;1&quot;,
                    &quot;active&quot;: true
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=2&quot;,
                    &quot;label&quot;: &quot;2&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=3&quot;,
                    &quot;label&quot;: &quot;3&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=4&quot;,
                    &quot;label&quot;: &quot;4&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=5&quot;,
                    &quot;label&quot;: &quot;5&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=6&quot;,
                    &quot;label&quot;: &quot;6&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=7&quot;,
                    &quot;label&quot;: &quot;7&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=8&quot;,
                    &quot;label&quot;: &quot;8&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=9&quot;,
                    &quot;label&quot;: &quot;9&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=10&quot;,
                    &quot;label&quot;: &quot;10&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;...&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=40&quot;,
                    &quot;label&quot;: &quot;40&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=41&quot;,
                    &quot;label&quot;: &quot;41&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=2&quot;,
                    &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                    &quot;active&quot;: false
                }
            ],
            &quot;next_page_url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=2&quot;,
            &quot;path&quot;: &quot;http://api-ppatq.test/api/kesantrian&quot;,
            &quot;per_page&quot;: 4,
            &quot;prev_page_url&quot;: null,
            &quot;to&quot;: 4,
            &quot;total&quot;: 164
        },
        &quot;santriCalon&quot;: {
            &quot;current_page&quot;: 1,
            &quot;data&quot;: [
                {
                    &quot;nik&quot;: &quot;3321042411170003&quot;,
                    &quot;nama&quot;: &quot;Ibrahim Abqori Agam&quot;,
                    &quot;jenis_kelamin&quot;: &quot;L&quot;,
                    &quot;namaGelombang&quot;: &quot;PSB&quot;
                },
                {
                    &quot;nik&quot;: &quot;3318122007970001&quot;,
                    &quot;nama&quot;: &quot;Najalil Umam Sutejo&quot;,
                    &quot;jenis_kelamin&quot;: &quot;L&quot;,
                    &quot;namaGelombang&quot;: &quot;PSB Online&quot;
                },
                {
                    &quot;nik&quot;: &quot;3324056210170001&quot;,
                    &quot;nama&quot;: &quot;Azzahra Asyila Bilqis&quot;,
                    &quot;jenis_kelamin&quot;: &quot;P&quot;,
                    &quot;namaGelombang&quot;: &quot;PSB&quot;
                },
                {
                    &quot;nik&quot;: &quot;3324141807180002&quot;,
                    &quot;nama&quot;: &quot;Al-Farezell Nadindra Setyo Gumilang&quot;,
                    &quot;jenis_kelamin&quot;: &quot;L&quot;,
                    &quot;namaGelombang&quot;: &quot;PSB&quot;
                }
            ],
            &quot;first_page_url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=1&quot;,
            &quot;from&quot;: 1,
            &quot;last_page&quot;: 73,
            &quot;last_page_url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=73&quot;,
            &quot;links&quot;: [
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=1&quot;,
                    &quot;label&quot;: &quot;1&quot;,
                    &quot;active&quot;: true
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=2&quot;,
                    &quot;label&quot;: &quot;2&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=3&quot;,
                    &quot;label&quot;: &quot;3&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=4&quot;,
                    &quot;label&quot;: &quot;4&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=5&quot;,
                    &quot;label&quot;: &quot;5&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=6&quot;,
                    &quot;label&quot;: &quot;6&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=7&quot;,
                    &quot;label&quot;: &quot;7&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=8&quot;,
                    &quot;label&quot;: &quot;8&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=9&quot;,
                    &quot;label&quot;: &quot;9&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=10&quot;,
                    &quot;label&quot;: &quot;10&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: null,
                    &quot;label&quot;: &quot;...&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=72&quot;,
                    &quot;label&quot;: &quot;72&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=73&quot;,
                    &quot;label&quot;: &quot;73&quot;,
                    &quot;active&quot;: false
                },
                {
                    &quot;url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=2&quot;,
                    &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                    &quot;active&quot;: false
                }
            ],
            &quot;next_page_url&quot;: &quot;http://api-ppatq.test/api/kesantrian?page=2&quot;,
            &quot;path&quot;: &quot;http://api-ppatq.test/api/kesantrian&quot;,
            &quot;per_page&quot;: 4,
            &quot;prev_page_url&quot;: null,
            &quot;to&quot;: 4,
            &quot;total&quot;: 291
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-kesantrian" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kesantrian"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kesantrian"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kesantrian" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kesantrian">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kesantrian" data-method="GET"
      data-path="api/kesantrian"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kesantrian', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kesantrian"
                    onclick="tryItOut('GETapi-kesantrian');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kesantrian"
                    onclick="cancelTryOut('GETapi-kesantrian');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kesantrian"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kesantrian</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-kesantrian"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kesantrian"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kesantrian"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-kelas-kamar">GET api/kelas-kamar</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-kelas-kamar">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/kelas-kamar" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/kelas-kamar"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kelas-kamar">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 41
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 200,
    &quot;message&quot;: &quot;Berhasil mengambil data&quot;,
    &quot;data&quot;: {
        &quot;dataKelas&quot;: [
            {
                &quot;nama_guru&quot;: &quot;Ahmad Musta?in, S.Pd&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IjRPa3hpWXg3M0hjSWRtNzdPSVFEblE9PSIsInZhbHVlIjoiMkkxZSswZ2plUjNiOFhPWlU3T3hFZz09IiwibWFjIjoiODc3MjU0NDU3MDBmMDM0OTk5NjQ1MDNiNTIwMTc3ODIzMmZiOGNjMzMxMDJkNjg5NzAxOWFlOTFjOTQ0NTE2OSIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 1A&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;Zulfa Auliyatun Nafisah&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IkJlS1lDa29SWXgvamJRR01MSWk1NEE9PSIsInZhbHVlIjoidExZeU45NU9EU0RyUkpQUVozRDR2dz09IiwibWFjIjoiNmZkYjM2ZGJiZDBkZWQ5MTU4NzI0ZTdlZWRmMDQ3OWMwZWQyN2M2YTIwZmZhZWQ1MzFmYmMwNzliN2JjZWRhZiIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 1B&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;M. Zidni Ilman Nafia, S.Pd&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IjVQMWV4NW9QUW50TjBiajhnYXRVVFE9PSIsInZhbHVlIjoiS1d1dGY1Ylo3d1lyaFU4ZDBmMHNGZz09IiwibWFjIjoiYmI1M2U5ZWQyYTQ1MzdjNWJkMTQ3ODc2MTlmMDJhNGVjMzc4ZTNkZTQ5NjgxM2Q2M2FiMWZmMTAxNGU2MzVhOSIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 2A&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;Anis Karomatu Dhuha&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IjBRbUs2N3hibUVmeVFqU2ZFTHZkMmc9PSIsInZhbHVlIjoiV2QyMGFvOCt3N2JEZ2M0Um8xUnVqQT09IiwibWFjIjoiMGIwYTQ2ZTZiYTRmNGFhYjQ0M2RiMmEzN2M5YjFlOThmZGQyYjNhODU3MWM1NjNhODkwNDNjMGMxNmY5MjRmYSIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 2B&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;Agus Ahmad Miftahul Yusuf, AH, S.Pd&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6ImViL0hwMHFzRTIxYmVqUG5sZjFSRXc9PSIsInZhbHVlIjoiYjlBUitkeWw2cXBBdkxrVkRiRmlwQT09IiwibWFjIjoiZGI5YzRhNDhiYzg3YzNlNmFkMzU2MWY3ZTc5YmQ5MjA5Y2I3NzFhMmU3NGU0ZWVjNDAyZTdlY2U1OTI2Yzc2YSIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 3A&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;Muslihah&#039;Ainur Rohmah, S.Pd&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IkR6Ty81RVFUUWcxdm5sRXdmRzBXYnc9PSIsInZhbHVlIjoiVERoOGxCTzVLZlhDanFvSUIyZ3pkQT09IiwibWFjIjoiNWU3NWM4YTY4MDc1ZWVhZTVhYzhkMzI5Y2U1M2M4ZDIzYTY1Mzc2N2I4Y2IxYTg2ODZjMTlmODQzNzRlYjgyMCIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 3B&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;MUhammad Fatikhul Amin, S.Pd&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IkcyaEk4U1YwMVlLK0NtaEVsYzFZUkE9PSIsInZhbHVlIjoib29sQ2ErZXREeDZqbnFHSmI5WmI3UT09IiwibWFjIjoiNWJiMGY1OTIxZmJmMWY4OTU5NGZiZTQ1ZGQ0NTQzNTE0OWVjMzE2NmM4ZDYxZWJiOGMxNWVlZTZiNGIwMjYzMyIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 4A&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;Nailis Safa?ah&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IkttMzU1d0pDaU01RE1QdHN5MW9rbGc9PSIsInZhbHVlIjoiVkhvTHZONmZLQ2xHaHVEbUZFeGxRdz09IiwibWFjIjoiY2VkNWRlOTRiN2VjMWE3NzIzYWI2NTZlMWFhYjA0OGE4MjI1Y2UxOWQ3MTljZjZlMjIyYmVlZWI2ZTllZTA5ZCIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 4B&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;M. Zaim Asror, S.Pd&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IkMvck5waTl5dFJScnVmcjNNN2lkcGc9PSIsInZhbHVlIjoiVW5mTWtEMjZpRUNHQlRJZUJrYmNHdz09IiwibWFjIjoiODQ3YzFiMmU0ODc5NDNlZmFhYTYyODNmNzFkZjRiMzI4Mjc2YzIyMGI0MTc5ZTM0NzU4ZjJhZmRjZWYxNDgwYyIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 5A&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;Zahrotun Nafisah, S.Pd.I&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IjR6K0ZpNXA4d0xHZ2xxV0lhcDBaMUE9PSIsInZhbHVlIjoidFRmbFhsUUsvOFJhOTBGVldoRWtEZz09IiwibWFjIjoiZDI3ZWZlOGJkNDM5ZjQxYjk3NjIyMDYwNDUzMGUzMjY0YmU4ODI1MDdlOTA3N2Y4NWJlMWY0Y2VkOGI1ZDVhZiIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 5B&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;M. Solikhin, S.Pd&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6InlwMFNkWHZ1SFRzVmV5aDd3OVNDZHc9PSIsInZhbHVlIjoiUE5US2wzRDljVTB0ZlZxNTBsTXZIdz09IiwibWFjIjoiNDRmNWEwZjdlNjIzMmJkNDk4ZjIxNTRlZjE3N2YzZGJjZjg5NjQzMTQ4MDQzZjAxMGVjM2EwMjAwOTAwOTVlMSIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 6A&quot;
            },
            {
                &quot;nama_guru&quot;: &quot;Imro?atul Khoiriyah, S.Pd.I&quot;,
                &quot;id_kelas&quot;: &quot;eyJpdiI6IkhsYkNscy9KTXFxUEhXZEFKWHJzZVE9PSIsInZhbHVlIjoicHhWbUFUVSt5NEtzZmNCUzkySkQwUT09IiwibWFjIjoiYTk3NmQ4YWM4MGM1ZWI3ZGU2ZjgzZWMwNjZlOWQ1YzA0YWMxNjAyM2MzOGM5ODU3NWU4YThhMTM5MGY4MjRkNyIsInRhZyI6IiJ9&quot;,
                &quot;name&quot;: &quot;Kelas 6B&quot;
            }
        ],
        &quot;dataKamar&quot;: [
            {
                &quot;id&quot;: &quot;eyJpdiI6Ik1kcGVSUTRLOUlGK1F1NU9vaHNtTWc9PSIsInZhbHVlIjoiTTF6Y2lsbFoybUtabVN5bUJ2NU11dz09IiwibWFjIjoiM2YzOTc5MzAzYTI0Mjg1MGY3MWNkNzExYzQ2M2FmNzlhMjJhMDRhMDkxNmRmOTYyNGQ4ZWE3ZjZkNTlkNTgyYyIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Sholihul Amri&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IjdxWDVMS29uakFDZ1dpQWE1TG1TZ2c9PSIsInZhbHVlIjoiejZ4MDFxMzFxK0swR1psTHd2U2ZzZz09IiwibWFjIjoiYzZhZmRmMWQzNmRhYjlhM2M5MjY2OWIwMDIwMWZjOTIyYTJkNzkyZTE0ZDJkYmJjOGIyMTViNTQ0OTZmZDczOSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Lina Ulfatun Nisfah&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6Ik1Ed2FXNWR4UzhiNll5UGtTVmNHSVE9PSIsInZhbHVlIjoieUhjZ0pjdFNmZ2IyOHk3Z0k1WE84dz09IiwibWFjIjoiZTM5YzQ2Zjk3MTAzN2I0Y2MyN2NlZDBlZTNkZmUwY2QzNDEzZjQ1MzliNjMyNDczYzViOTM1MTgzNzgzYzZjYyIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Ahmad Sholeh&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IkZYUEJIRmpKWjBrWWFEWTZ0WDJOV1E9PSIsInZhbHVlIjoibCtPZldVYTN3SVpBcnpqdnhnekcxZz09IiwibWFjIjoiMDcyMzhhOWE5YjhmOWY1NDFmMzc1MWQ4ZTdlZjMxNjA4NzJhZjcwNGQwOGI1ZWE1NTdlMWM0OWEyMjAwNDM0OSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Farah Dyah Ayu Safitri&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IjA5eXVZU3N5VG92SjByTElSbU5SMGc9PSIsInZhbHVlIjoiZEZRMmF4WDVCbkxWRnNHUjdwak5hZz09IiwibWFjIjoiZDY2MGVkYjI1MmY1MTI3MDc1NmZmYTM3MDNlMDc4MmJlZmJiOWFjMTM3M2Y3NGE2MzFlZDFmMzc3ODIxNmQ3MSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;MUhammad Miftahul Ulum&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IkNxcExOMUp1K2xJaGQ0Wm9abU1SNGc9PSIsInZhbHVlIjoiTUltQ1JQcTlHT2Mvd1RuWVNZVHUyZz09IiwibWFjIjoiNjVlMjg4YWJhZDY4ZjdiYzlhMjRlOTZmYThkMjU3NTA3NzQwNTcyOGQ0OWEzNGU3ODk5NjdkMjY5MWU3YTE4YyIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Putri Din Amartiyah&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6ImwzNnpkWUR5ZDIwc0dqWUxnMmFVRXc9PSIsInZhbHVlIjoiN1I4eFk3WUdnbksrUVBIWkhUTVllQT09IiwibWFjIjoiYzU0NjQ2ZjI0MTcwNTZlNzQ3ODZhNzEzNGI5YjFmOGJmZTQxYjdiNzJjYzFmYThhY2Y1YzlmYmE1Y2QzNjE4YiIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Ahmad Badawi, AH&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6Ilk1ZExJSk1pZllhV2ZTNnBmQ0JGc2c9PSIsInZhbHVlIjoibUcwNjNHcWhNamcrcm1YaUlkSE5odz09IiwibWFjIjoiMTY2NmYzNDM0MjE3YjI1NjQxMDNjZmIwZjcxODU3NTFiMGExNGMxNzdlZTZmYWFiYmU1NzljZTM5ZGE3OGY4MiIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Anis Karomatu Dhuha&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6Ilo5cHMzR1dLZDJ5aE5wcFFHNUNrMmc9PSIsInZhbHVlIjoic2ZLdUdDZ3N4ZVBFNUFESnRlYm9wdz09IiwibWFjIjoiMDU0ZTEwNGM4NGFmMWZhOGI1ZTViMTYwOTgxNWQ3YTIzYWRiMWY5ZTM5YzE2NTBiMTJjNzQwOGI0NjQ5YzI4NCIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;M. Faihsol&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6InFOVVp0dEpqOEtLNkdEemxTdVFiVXc9PSIsInZhbHVlIjoiRm11NUN4UTA0QkdlMEVXbzdNV3FoZz09IiwibWFjIjoiNTliNDMxOWVlYWI3NzBkMGU3ZDlhM2NmYjg2OTg0MWNkOThjZGVjYjQ1NzM5ZjAwYjc5OTI3ZDY5MjVlZTRlZCIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Fitriyah&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IlBlb3ZLL2g5TWRrWHlvSjlnQU03bWc9PSIsInZhbHVlIjoiVzdKZHJycjBEbzhtSU5vdGFNdDFYQT09IiwibWFjIjoiNzBhNjllNzc1NjdlMzA4NWY1MDQ1ZDRmMTNmZjQzMGQ5YjdiN2E4OTFmNGYxZGQwNjYwMjYyZWZhMGU0MTFkMCIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Ahmad Lutfi&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IjR1SEtZVjMwVFl5STdpZFpjS2w0YkE9PSIsInZhbHVlIjoiZFpTQmJVMHRrdmVaZTRka3ZjK25wZz09IiwibWFjIjoiNTdmMjNmNjQ1OGZkMmQ4YTUwOTJiZGJhNGU4ZDc0MjgzMTExZmM2NmYwZmE5M2QyNmEyODM4MTA3MzljYTExYiIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Alif Munfarika&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6Ik9OeHdMZjRCRzNtMTlIYmdPU1FRZ0E9PSIsInZhbHVlIjoiQnlrMlR6d1dRdGthODdWMkpoNmpmUT09IiwibWFjIjoiNGYyNmE1YjAzZGI1NjQ2ZDliMWE0YjE3NDBmNDRiYmJlZDM0Njk0MTE5M2IwMDFhZGU3OGQ4ZTAxYjlkYTlkNyIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Abdul Jalil Nurusshobah, AH&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IkpJYkhObzBVVnJ3eFpMMTVsdW1RNnc9PSIsInZhbHVlIjoiUlB3K0F5eUtkaU1UVjlRYnZUYnI4dz09IiwibWFjIjoiYzc0Y2YyNGMzZTIwOTkwNmRmZTdhOWM0OGU2ODcyMmZlMTZlZGU4ODA3ZWFlZTE3OThlMWE3YzhkNzYyMTgzNSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Desti Puspita Sari&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IkVjYlJTQW9aeEU1dUdzOGhXaU5DK3c9PSIsInZhbHVlIjoiR1lFWlp1dFV3emFEN0FJVm52OW15QT09IiwibWFjIjoiZTliODEzNzhjZjhmNDU4YzBmNmRmNGJhNzQ2NWVmOTYwNmQyNWRlODA0OTEzZjg5YjQ0NWZmZTg1Y2NmZWVlMiIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Muhammad Najib&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IlhuNjBWcURicVR6Q3dQT2t3Z2JOWlE9PSIsInZhbHVlIjoiTFcyUFZMTHVlM2piT0FmYy9mKy9Vdz09IiwibWFjIjoiZGY5M2IwY2IzNmNjOTVmYTExMmMyMmI5ZjkzMzQ3NTUyZTRkNjNhYmY4N2FlMzA4MmYzYWQzNzZjYjJlYTQ4NCIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Ririn Sulistiowati&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6ImFGWE04eHFETCtETytQOEpTOERqZHc9PSIsInZhbHVlIjoiS3hGMDZlbGViZGVUV2JuWmtpSXBldz09IiwibWFjIjoiYjAzYTYxNzAyNjIyNWE2MDE5MDhiODQ1NTJjNmI0M2ZjMWFjNzgyZGQzNjUyNjBhZTE2NGY2NTkxZmM4NGQ1YSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Dedy Verdiansyah&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IjdYRXFCU2Z1MDhYNDU5SzFhTHJjTHc9PSIsInZhbHVlIjoiWHA1NzhMbjhaYmx5L3lKZDZaNjhZZz09IiwibWFjIjoiMmNmZTliNWQzYWI3YjdhYjkxZjVlNDY1ZjAxZTEzNmFmMjU3NjJiMzczMTJkZGE5YzdmZDc4MWMyMzQzYjI3YiIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Musfiroh&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6InVtRFRvS0trOWNSL1dyRm9PL0VoWUE9PSIsInZhbHVlIjoiWndoVmErci9Kck5tWXBoTzNJVlRxUT09IiwibWFjIjoiZmNiOWM2YTkyZGI0MTI0MzgwNjFhZjU0MzMxMmM3MzM1M2Q3NDMyMmY4NDg4YjJkOTFlZjhjNmI2MTAxNTA3ZSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Shohibul Burhan&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IjhHbTlnUTEwM054SWgwOHFTSGVBM2c9PSIsInZhbHVlIjoieGEzbnNQaUc0eEdzWXhzTUUvZlBQUT09IiwibWFjIjoiYWE2NTU3MGI1NGQ1OWFlYzkyYmIwOGFjMjJjNzZjNTMyNDFlZTU5YWIwYmY0YzNlYTE1NTkxMDJiNzIzOGRmZSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Aris Zuliana&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IkhHRytMRjcra0E2TTJiaGFsOHphT1E9PSIsInZhbHVlIjoidDZLNjVTOW5SeXoveS83SUFVOHpudz09IiwibWFjIjoiNmI4MGUwYmFiMTBlNDdhZjAyY2NkOTNhZDkyMDhkNDUzYWRkNjdkYTU1OGU3YTMyZDM2MDZkOWI4OWMzYjZjNiIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Aufa Dzaqok&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IlI2MGRHRzAyY0dlQzVpakJ2QlM2bXc9PSIsInZhbHVlIjoiZm1HTEpjQ0tuNTRKOFdzNGVFT2xSQT09IiwibWFjIjoiMzc1OTIxNGMxYjRkMmI4ODE5ODdhM2M2ZDgwOTI2ZjM1MmE5ZTJmZTRiOTg5MDgyNDJmMzM1MDIzNTYyNGMxNiIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Siti Rahmawati&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6InVtZk85R3J6N28vdHAyZDZjMEZXd1E9PSIsInZhbHVlIjoicXJ5bDQrQk9HK3ZLeVRnd3E2TnZadz09IiwibWFjIjoiNDU2MWJkOTk2ZDQ3OWNlNzM5YWJjNzZhZDIzMzU0ZWZmZDRjNDNkODI4ZTljN2NmZGQwNjE3MjdjM2NlM2QzMCIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;M. Ainun Naim&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6Ik1FaWpBWGd3Mlg4Z2NFQ2NBRzZ0TEE9PSIsInZhbHVlIjoiYnVRWEF3K0EycUFlMC9QUTFWeWpvUT09IiwibWFjIjoiYWUwY2ZiNTEwYTFhNDdmYjdmMjU4YjUwNzE2YmVlYjM2NjE4MmI3MWVmNDE1MzQwMzMyNDMyMTE2MWViYWM2YyIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Fitri Aizatul Aliyah&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6ImJjYlBBWUN4TWxFR3F3bmhBUXF6dkE9PSIsInZhbHVlIjoiVjB4YU9Icm9XNmVCNEhHNzNjUlZxQT09IiwibWFjIjoiYjk5MzZhNDE2MWZhNjdkYWNjZjc5ZThlNzkzNzgyM2FhYWRjOTEwOWQxMDBlNzgyMzBiYWQ5NWU2NTZlZjFiMSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Ahmad Sya&#039;roni&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IklOR1V4RFgvbVp0UTFNUFFUM0lNdFE9PSIsInZhbHVlIjoiY015Zm5IM3NUNGtZaWoyVHZyNXhnUT09IiwibWFjIjoiYzM5ZDEzYTJkYmI4M2U3YjM3ZWUwODM2MTlhMTNkY2UwYjFjZWNjMjg2OWYzYzNmN2RjZWVkYmNjOGZiMjM3ZSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Wanda Hanum Fatmawati&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6Ik9JUk8xS0loTTByRWEvR3EvZk55K0E9PSIsInZhbHVlIjoiRWptWko0ZUVCbHg5VktZV1ZsUXd2UT09IiwibWFjIjoiYmI2MDQ5ZGMwZTZjZjRiNGQ0YWZmNWEwODBmZDNkYWYxZDY3YmE2YjA0ZDlkYzliMDRkYWYzYjhlNjdiNGIwYyIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Shandi Armansyah&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6IlpCd3c4VzhhUStmMmJGRG1nQUYreEE9PSIsInZhbHVlIjoid0EzRTBQRGJObkFoTTVOWDZMNjJKQT09IiwibWFjIjoiZWEzZjBjYzc4NzFiMDI0MjRjNGZlZGI1OGRjMjhhY2IzZGYyNGEzNmU1ZGI3N2IyODIwODE4M2NlN2FiOGFiOCIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Umi Nurohmah&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6InNtV1B1Vm5hNU84VG90TVl2VTdXMFE9PSIsInZhbHVlIjoidVAxYnp6SzBnRURRejh3QU5LOHVxZz09IiwibWFjIjoiNzNmOTljN2Q4Y2Q0YzQ2ZDRlZmQ3NzkyZWJkMWE4MzhjNzExYmY0OGM3MDk1ZDhhMWMxNTM3OTg2OTA0MTc4NSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Qolbi Atthohir, AH&quot;
            },
            {
                &quot;id&quot;: &quot;eyJpdiI6ImFZU05qL09jK2xHWVlSa0craTRBaVE9PSIsInZhbHVlIjoiam1jamdsdUwrYnRzcG9qZnhSQTJwdz09IiwibWFjIjoiZWZjNDg1N2Y3ZjJkYWU1MWNmM2EwZmNkYTkzMzBhMTViY2UwZWJhNjVkZGZjYzczZjJlNmM5Yzk2YzYwYTE5OSIsInRhZyI6IiJ9&quot;,
                &quot;guru_murroby&quot;: &quot;Anis Wulandari&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-kelas-kamar" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kelas-kamar"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kelas-kamar"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kelas-kamar" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kelas-kamar">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kelas-kamar" data-method="GET"
      data-path="api/kelas-kamar"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kelas-kamar', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kelas-kamar"
                    onclick="tryItOut('GETapi-kelas-kamar');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kelas-kamar"
                    onclick="cancelTryOut('GETapi-kelas-kamar');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kelas-kamar"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kelas-kamar</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-kelas-kamar"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kelas-kamar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kelas-kamar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-kelas--id-">GET api/kelas/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-kelas--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/kelas/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/kelas/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kelas--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
x-ratelimit-limit: 60
x-ratelimit-remaining: 40
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-kelas--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kelas--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kelas--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kelas--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kelas--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kelas--id-" data-method="GET"
      data-path="api/kelas/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kelas--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kelas--id-"
                    onclick="tryItOut('GETapi-kelas--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kelas--id-"
                    onclick="cancelTryOut('GETapi-kelas--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kelas--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kelas/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-kelas--id-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kelas--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kelas--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-kelas--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the kela. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-kamar--id-">GET api/kamar/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-kamar--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/kamar/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/kamar/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-kamar--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
x-ratelimit-limit: 60
x-ratelimit-remaining: 39
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-kamar--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-kamar--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-kamar--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-kamar--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-kamar--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-kamar--id-" data-method="GET"
      data-path="api/kamar/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-kamar--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-kamar--id-"
                    onclick="tryItOut('GETapi-kamar--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-kamar--id-"
                    onclick="cancelTryOut('GETapi-kamar--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-kamar--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/kamar/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-kamar--id-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-kamar--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-kamar--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-kamar--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the kamar. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-ustad-login">POST api/ustad/login</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-ustad-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/ustad/login" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"password\": \"Z5ij-e\\/dl4m{o,\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/ustad/login"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "password": "Z5ij-e\/dl4m{o,"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-ustad-login">
</span>
<span id="execution-results-POSTapi-ustad-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-ustad-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-ustad-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-ustad-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-ustad-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-ustad-login" data-method="POST"
      data-path="api/ustad/login"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-ustad-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-ustad-login"
                    onclick="tryItOut('POSTapi-ustad-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-ustad-login"
                    onclick="cancelTryOut('POSTapi-ustad-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-ustad-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/ustad/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-ustad-login"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-ustad-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-ustad-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-ustad-login"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 100 characters. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-ustad-login"
               value="Z5ij-e/dl4m{o,"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>Z5ij-e/dl4m{o,</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-keuangan-login">POST api/keuangan/login</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-keuangan-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/keuangan/login" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"password\": \"Z5ij-e\\/dl4m{o,\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/keuangan/login"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "password": "Z5ij-e\/dl4m{o,"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-keuangan-login">
</span>
<span id="execution-results-POSTapi-keuangan-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-keuangan-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-keuangan-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-keuangan-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-keuangan-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-keuangan-login" data-method="POST"
      data-path="api/keuangan/login"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-keuangan-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-keuangan-login"
                    onclick="tryItOut('POSTapi-keuangan-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-keuangan-login"
                    onclick="cancelTryOut('POSTapi-keuangan-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-keuangan-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/keuangan/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-keuangan-login"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-keuangan-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-keuangan-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-keuangan-login"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 100 characters. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-keuangan-login"
               value="Z5ij-e/dl4m{o,"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>Z5ij-e/dl4m{o,</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-ustad-logout">POST api/ustad/logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-ustad-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/ustad/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/ustad/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-ustad-logout">
</span>
<span id="execution-results-POSTapi-ustad-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-ustad-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-ustad-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-ustad-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-ustad-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-ustad-logout" data-method="POST"
      data-path="api/ustad/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-ustad-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-ustad-logout"
                    onclick="tryItOut('POSTapi-ustad-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-ustad-logout"
                    onclick="cancelTryOut('POSTapi-ustad-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-ustad-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/ustad/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-ustad-logout"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-ustad-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-ustad-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-keuangan-logout">POST api/keuangan/logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-keuangan-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/keuangan/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/keuangan/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-keuangan-logout">
</span>
<span id="execution-results-POSTapi-keuangan-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-keuangan-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-keuangan-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-keuangan-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-keuangan-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-keuangan-logout" data-method="POST"
      data-path="api/keuangan/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-keuangan-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-keuangan-logout"
                    onclick="tryItOut('POSTapi-keuangan-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-keuangan-logout"
                    onclick="cancelTryOut('POSTapi-keuangan-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-keuangan-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/keuangan/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-keuangan-logout"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-keuangan-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-keuangan-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-keuangan-lapor-bayar">POST api/keuangan/lapor-bayar</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-keuangan-lapor-bayar">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/keuangan/lapor-bayar" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/keuangan/lapor-bayar"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-keuangan-lapor-bayar">
</span>
<span id="execution-results-POSTapi-keuangan-lapor-bayar" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-keuangan-lapor-bayar"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-keuangan-lapor-bayar"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-keuangan-lapor-bayar" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-keuangan-lapor-bayar">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-keuangan-lapor-bayar" data-method="POST"
      data-path="api/keuangan/lapor-bayar"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-keuangan-lapor-bayar', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-keuangan-lapor-bayar"
                    onclick="tryItOut('POSTapi-keuangan-lapor-bayar');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-keuangan-lapor-bayar"
                    onclick="cancelTryOut('POSTapi-keuangan-lapor-bayar');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-keuangan-lapor-bayar"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/keuangan/lapor-bayar</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-keuangan-lapor-bayar"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-keuangan-lapor-bayar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-keuangan-lapor-bayar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-murroby-santri--idUser-">GET api/murroby/santri/{idUser}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri--idUser-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri--idUser-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri--idUser-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri--idUser-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri--idUser-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri--idUser-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri--idUser-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri--idUser-" data-method="GET"
      data-path="api/murroby/santri/{idUser}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri--idUser-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri--idUser-"
                    onclick="tryItOut('GETapi-murroby-santri--idUser-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri--idUser-"
                    onclick="cancelTryOut('GETapi-murroby-santri--idUser-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri--idUser-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/{idUser}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri--idUser-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idUser</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idUser"                data-endpoint="GETapi-murroby-santri--idUser-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-murroby-santri-pemeriksaan--idUser-">GET api/murroby/santri/pemeriksaan/{idUser}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri-pemeriksaan--idUser-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/pemeriksaan/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/pemeriksaan/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri-pemeriksaan--idUser-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri-pemeriksaan--idUser-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri-pemeriksaan--idUser-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri-pemeriksaan--idUser-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri-pemeriksaan--idUser-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri-pemeriksaan--idUser-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri-pemeriksaan--idUser-" data-method="GET"
      data-path="api/murroby/santri/pemeriksaan/{idUser}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri-pemeriksaan--idUser-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri-pemeriksaan--idUser-"
                    onclick="tryItOut('GETapi-murroby-santri-pemeriksaan--idUser-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri-pemeriksaan--idUser-"
                    onclick="cancelTryOut('GETapi-murroby-santri-pemeriksaan--idUser-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri-pemeriksaan--idUser-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/pemeriksaan/{idUser}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri-pemeriksaan--idUser-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri-pemeriksaan--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri-pemeriksaan--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idUser</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idUser"                data-endpoint="GETapi-murroby-santri-pemeriksaan--idUser-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-murroby-santri-pemeriksaan">POST api/murroby/santri/pemeriksaan</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-murroby-santri-pemeriksaan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/murroby/santri/pemeriksaan" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/pemeriksaan"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-murroby-santri-pemeriksaan">
</span>
<span id="execution-results-POSTapi-murroby-santri-pemeriksaan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-murroby-santri-pemeriksaan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-murroby-santri-pemeriksaan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-murroby-santri-pemeriksaan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-murroby-santri-pemeriksaan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-murroby-santri-pemeriksaan" data-method="POST"
      data-path="api/murroby/santri/pemeriksaan"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-murroby-santri-pemeriksaan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-murroby-santri-pemeriksaan"
                    onclick="tryItOut('POSTapi-murroby-santri-pemeriksaan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-murroby-santri-pemeriksaan"
                    onclick="cancelTryOut('POSTapi-murroby-santri-pemeriksaan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-murroby-santri-pemeriksaan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/murroby/santri/pemeriksaan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-murroby-santri-pemeriksaan"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-murroby-santri-pemeriksaan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-murroby-santri-pemeriksaan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-murroby-santri-pemeriksaan-detail--noInduk-">GET api/murroby/santri/pemeriksaan/detail/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri-pemeriksaan-detail--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/pemeriksaan/detail/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/pemeriksaan/detail/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri-pemeriksaan-detail--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri-pemeriksaan-detail--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri-pemeriksaan-detail--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri-pemeriksaan-detail--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri-pemeriksaan-detail--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri-pemeriksaan-detail--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri-pemeriksaan-detail--noInduk-" data-method="GET"
      data-path="api/murroby/santri/pemeriksaan/detail/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri-pemeriksaan-detail--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri-pemeriksaan-detail--noInduk-"
                    onclick="tryItOut('GETapi-murroby-santri-pemeriksaan-detail--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri-pemeriksaan-detail--noInduk-"
                    onclick="cancelTryOut('GETapi-murroby-santri-pemeriksaan-detail--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri-pemeriksaan-detail--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/pemeriksaan/detail/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri-pemeriksaan-detail--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri-pemeriksaan-detail--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri-pemeriksaan-detail--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-murroby-santri-pemeriksaan-detail--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-">GET api/murroby/santri/pemeriksaan/edit/{idPemeriksaan}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/pemeriksaan/edit/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/pemeriksaan/edit/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-" data-method="GET"
      data-path="api/murroby/santri/pemeriksaan/edit/{idPemeriksaan}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-"
                    onclick="tryItOut('GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-"
                    onclick="cancelTryOut('GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/pemeriksaan/edit/{idPemeriksaan}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idPemeriksaan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idPemeriksaan"                data-endpoint="GETapi-murroby-santri-pemeriksaan-edit--idPemeriksaan-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-">PUT api/murroby/santri/pemeriksaan/update/{idPemeriksaan}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://api-ppatq.test/api/murroby/santri/pemeriksaan/update/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/pemeriksaan/update/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-">
</span>
<span id="execution-results-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-" data-method="PUT"
      data-path="api/murroby/santri/pemeriksaan/update/{idPemeriksaan}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-"
                    onclick="tryItOut('PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-"
                    onclick="cancelTryOut('PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/murroby/santri/pemeriksaan/update/{idPemeriksaan}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idPemeriksaan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idPemeriksaan"                data-endpoint="PUTapi-murroby-santri-pemeriksaan-update--idPemeriksaan-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-">DELETE api/murroby/santri/pemeriksaan/{idPemeriksaan}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://api-ppatq.test/api/murroby/santri/pemeriksaan/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/pemeriksaan/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-">
</span>
<span id="execution-results-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-" data-method="DELETE"
      data-path="api/murroby/santri/pemeriksaan/{idPemeriksaan}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-"
                    onclick="tryItOut('DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-"
                    onclick="cancelTryOut('DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/murroby/santri/pemeriksaan/{idPemeriksaan}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idPemeriksaan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idPemeriksaan"                data-endpoint="DELETEapi-murroby-santri-pemeriksaan--idPemeriksaan-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-murroby-santri-perilaku--idUser-">GET api/murroby/santri/perilaku/{idUser}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri-perilaku--idUser-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/perilaku/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/perilaku/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri-perilaku--idUser-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri-perilaku--idUser-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri-perilaku--idUser-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri-perilaku--idUser-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri-perilaku--idUser-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri-perilaku--idUser-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri-perilaku--idUser-" data-method="GET"
      data-path="api/murroby/santri/perilaku/{idUser}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri-perilaku--idUser-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri-perilaku--idUser-"
                    onclick="tryItOut('GETapi-murroby-santri-perilaku--idUser-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri-perilaku--idUser-"
                    onclick="cancelTryOut('GETapi-murroby-santri-perilaku--idUser-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri-perilaku--idUser-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/perilaku/{idUser}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri-perilaku--idUser-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri-perilaku--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri-perilaku--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idUser</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idUser"                data-endpoint="GETapi-murroby-santri-perilaku--idUser-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-murroby-santri-perilaku">POST api/murroby/santri/perilaku</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-murroby-santri-perilaku">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/murroby/santri/perilaku" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/perilaku"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-murroby-santri-perilaku">
</span>
<span id="execution-results-POSTapi-murroby-santri-perilaku" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-murroby-santri-perilaku"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-murroby-santri-perilaku"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-murroby-santri-perilaku" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-murroby-santri-perilaku">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-murroby-santri-perilaku" data-method="POST"
      data-path="api/murroby/santri/perilaku"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-murroby-santri-perilaku', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-murroby-santri-perilaku"
                    onclick="tryItOut('POSTapi-murroby-santri-perilaku');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-murroby-santri-perilaku"
                    onclick="cancelTryOut('POSTapi-murroby-santri-perilaku');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-murroby-santri-perilaku"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/murroby/santri/perilaku</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-murroby-santri-perilaku"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-murroby-santri-perilaku"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-murroby-santri-perilaku"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-murroby-santri-perilaku-detail--noInduk-">GET api/murroby/santri/perilaku/detail/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri-perilaku-detail--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/perilaku/detail/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/perilaku/detail/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri-perilaku-detail--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri-perilaku-detail--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri-perilaku-detail--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri-perilaku-detail--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri-perilaku-detail--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri-perilaku-detail--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri-perilaku-detail--noInduk-" data-method="GET"
      data-path="api/murroby/santri/perilaku/detail/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri-perilaku-detail--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri-perilaku-detail--noInduk-"
                    onclick="tryItOut('GETapi-murroby-santri-perilaku-detail--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri-perilaku-detail--noInduk-"
                    onclick="cancelTryOut('GETapi-murroby-santri-perilaku-detail--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri-perilaku-detail--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/perilaku/detail/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri-perilaku-detail--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri-perilaku-detail--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri-perilaku-detail--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-murroby-santri-perilaku-detail--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-murroby-santri-perilaku-edit--idPerilaku-">GET api/murroby/santri/perilaku/edit/{idPerilaku}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri-perilaku-edit--idPerilaku-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/perilaku/edit/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/perilaku/edit/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri-perilaku-edit--idPerilaku-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri-perilaku-edit--idPerilaku-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri-perilaku-edit--idPerilaku-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri-perilaku-edit--idPerilaku-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri-perilaku-edit--idPerilaku-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri-perilaku-edit--idPerilaku-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri-perilaku-edit--idPerilaku-" data-method="GET"
      data-path="api/murroby/santri/perilaku/edit/{idPerilaku}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri-perilaku-edit--idPerilaku-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri-perilaku-edit--idPerilaku-"
                    onclick="tryItOut('GETapi-murroby-santri-perilaku-edit--idPerilaku-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri-perilaku-edit--idPerilaku-"
                    onclick="cancelTryOut('GETapi-murroby-santri-perilaku-edit--idPerilaku-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri-perilaku-edit--idPerilaku-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/perilaku/edit/{idPerilaku}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri-perilaku-edit--idPerilaku-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri-perilaku-edit--idPerilaku-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri-perilaku-edit--idPerilaku-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idPerilaku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idPerilaku"                data-endpoint="GETapi-murroby-santri-perilaku-edit--idPerilaku-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-murroby-santri-perilaku-update--idPerilaku-">PUT api/murroby/santri/perilaku/update/{idPerilaku}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-murroby-santri-perilaku-update--idPerilaku-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://api-ppatq.test/api/murroby/santri/perilaku/update/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/perilaku/update/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-murroby-santri-perilaku-update--idPerilaku-">
</span>
<span id="execution-results-PUTapi-murroby-santri-perilaku-update--idPerilaku-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-murroby-santri-perilaku-update--idPerilaku-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-murroby-santri-perilaku-update--idPerilaku-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-murroby-santri-perilaku-update--idPerilaku-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-murroby-santri-perilaku-update--idPerilaku-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-murroby-santri-perilaku-update--idPerilaku-" data-method="PUT"
      data-path="api/murroby/santri/perilaku/update/{idPerilaku}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-murroby-santri-perilaku-update--idPerilaku-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-murroby-santri-perilaku-update--idPerilaku-"
                    onclick="tryItOut('PUTapi-murroby-santri-perilaku-update--idPerilaku-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-murroby-santri-perilaku-update--idPerilaku-"
                    onclick="cancelTryOut('PUTapi-murroby-santri-perilaku-update--idPerilaku-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-murroby-santri-perilaku-update--idPerilaku-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/murroby/santri/perilaku/update/{idPerilaku}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-murroby-santri-perilaku-update--idPerilaku-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-murroby-santri-perilaku-update--idPerilaku-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-murroby-santri-perilaku-update--idPerilaku-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idPerilaku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idPerilaku"                data-endpoint="PUTapi-murroby-santri-perilaku-update--idPerilaku-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-murroby-santri-perilaku--idPerilaku-">DELETE api/murroby/santri/perilaku/{idPerilaku}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-murroby-santri-perilaku--idPerilaku-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://api-ppatq.test/api/murroby/santri/perilaku/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/perilaku/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-murroby-santri-perilaku--idPerilaku-">
</span>
<span id="execution-results-DELETEapi-murroby-santri-perilaku--idPerilaku-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-murroby-santri-perilaku--idPerilaku-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-murroby-santri-perilaku--idPerilaku-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-murroby-santri-perilaku--idPerilaku-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-murroby-santri-perilaku--idPerilaku-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-murroby-santri-perilaku--idPerilaku-" data-method="DELETE"
      data-path="api/murroby/santri/perilaku/{idPerilaku}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-murroby-santri-perilaku--idPerilaku-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-murroby-santri-perilaku--idPerilaku-"
                    onclick="tryItOut('DELETEapi-murroby-santri-perilaku--idPerilaku-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-murroby-santri-perilaku--idPerilaku-"
                    onclick="cancelTryOut('DELETEapi-murroby-santri-perilaku--idPerilaku-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-murroby-santri-perilaku--idPerilaku-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/murroby/santri/perilaku/{idPerilaku}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-murroby-santri-perilaku--idPerilaku-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-murroby-santri-perilaku--idPerilaku-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-murroby-santri-perilaku--idPerilaku-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idPerilaku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idPerilaku"                data-endpoint="DELETEapi-murroby-santri-perilaku--idPerilaku-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-murroby-santri-kelengkapan--idUser-">GET api/murroby/santri/kelengkapan/{idUser}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri-kelengkapan--idUser-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/kelengkapan/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/kelengkapan/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri-kelengkapan--idUser-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri-kelengkapan--idUser-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri-kelengkapan--idUser-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri-kelengkapan--idUser-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri-kelengkapan--idUser-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri-kelengkapan--idUser-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri-kelengkapan--idUser-" data-method="GET"
      data-path="api/murroby/santri/kelengkapan/{idUser}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri-kelengkapan--idUser-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri-kelengkapan--idUser-"
                    onclick="tryItOut('GETapi-murroby-santri-kelengkapan--idUser-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri-kelengkapan--idUser-"
                    onclick="cancelTryOut('GETapi-murroby-santri-kelengkapan--idUser-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri-kelengkapan--idUser-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/kelengkapan/{idUser}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri-kelengkapan--idUser-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri-kelengkapan--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri-kelengkapan--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idUser</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idUser"                data-endpoint="GETapi-murroby-santri-kelengkapan--idUser-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-murroby-santri-kelengkapan">POST api/murroby/santri/kelengkapan</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-murroby-santri-kelengkapan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/murroby/santri/kelengkapan" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/kelengkapan"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-murroby-santri-kelengkapan">
</span>
<span id="execution-results-POSTapi-murroby-santri-kelengkapan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-murroby-santri-kelengkapan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-murroby-santri-kelengkapan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-murroby-santri-kelengkapan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-murroby-santri-kelengkapan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-murroby-santri-kelengkapan" data-method="POST"
      data-path="api/murroby/santri/kelengkapan"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-murroby-santri-kelengkapan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-murroby-santri-kelengkapan"
                    onclick="tryItOut('POSTapi-murroby-santri-kelengkapan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-murroby-santri-kelengkapan"
                    onclick="cancelTryOut('POSTapi-murroby-santri-kelengkapan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-murroby-santri-kelengkapan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/murroby/santri/kelengkapan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-murroby-santri-kelengkapan"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-murroby-santri-kelengkapan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-murroby-santri-kelengkapan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-murroby-santri-kelengkapan-detail--noInduk-">GET api/murroby/santri/kelengkapan/detail/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri-kelengkapan-detail--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/kelengkapan/detail/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/kelengkapan/detail/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri-kelengkapan-detail--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri-kelengkapan-detail--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri-kelengkapan-detail--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri-kelengkapan-detail--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri-kelengkapan-detail--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri-kelengkapan-detail--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri-kelengkapan-detail--noInduk-" data-method="GET"
      data-path="api/murroby/santri/kelengkapan/detail/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri-kelengkapan-detail--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri-kelengkapan-detail--noInduk-"
                    onclick="tryItOut('GETapi-murroby-santri-kelengkapan-detail--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri-kelengkapan-detail--noInduk-"
                    onclick="cancelTryOut('GETapi-murroby-santri-kelengkapan-detail--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri-kelengkapan-detail--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/kelengkapan/detail/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri-kelengkapan-detail--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri-kelengkapan-detail--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri-kelengkapan-detail--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-murroby-santri-kelengkapan-detail--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-">GET api/murroby/santri/kelengkapan/edit/{idKelengkapan}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/santri/kelengkapan/edit/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/kelengkapan/edit/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-" data-method="GET"
      data-path="api/murroby/santri/kelengkapan/edit/{idKelengkapan}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-"
                    onclick="tryItOut('GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-"
                    onclick="cancelTryOut('GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/santri/kelengkapan/edit/{idKelengkapan}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idKelengkapan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idKelengkapan"                data-endpoint="GETapi-murroby-santri-kelengkapan-edit--idKelengkapan-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-">PUT api/murroby/santri/kelengkapan/update/{idKelengkapan}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://api-ppatq.test/api/murroby/santri/kelengkapan/update/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/kelengkapan/update/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-">
</span>
<span id="execution-results-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-" data-method="PUT"
      data-path="api/murroby/santri/kelengkapan/update/{idKelengkapan}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-"
                    onclick="tryItOut('PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-"
                    onclick="cancelTryOut('PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/murroby/santri/kelengkapan/update/{idKelengkapan}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idKelengkapan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idKelengkapan"                data-endpoint="PUTapi-murroby-santri-kelengkapan-update--idKelengkapan-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-">DELETE api/murroby/santri/kelengkapan/{idKelengkapan}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://api-ppatq.test/api/murroby/santri/kelengkapan/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/santri/kelengkapan/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-">
</span>
<span id="execution-results-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-" data-method="DELETE"
      data-path="api/murroby/santri/kelengkapan/{idKelengkapan}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-murroby-santri-kelengkapan--idKelengkapan-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-"
                    onclick="tryItOut('DELETEapi-murroby-santri-kelengkapan--idKelengkapan-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-"
                    onclick="cancelTryOut('DELETEapi-murroby-santri-kelengkapan--idKelengkapan-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-murroby-santri-kelengkapan--idKelengkapan-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/murroby/santri/kelengkapan/{idKelengkapan}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-murroby-santri-kelengkapan--idKelengkapan-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-murroby-santri-kelengkapan--idKelengkapan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-murroby-santri-kelengkapan--idKelengkapan-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idKelengkapan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idKelengkapan"                data-endpoint="DELETEapi-murroby-santri-kelengkapan--idKelengkapan-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-murroby-uang-saku--idUser-">GET api/murroby/uang-saku/{idUser}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-uang-saku--idUser-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/uang-saku/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/uang-saku/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-uang-saku--idUser-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-uang-saku--idUser-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-uang-saku--idUser-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-uang-saku--idUser-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-uang-saku--idUser-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-uang-saku--idUser-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-uang-saku--idUser-" data-method="GET"
      data-path="api/murroby/uang-saku/{idUser}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-uang-saku--idUser-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-uang-saku--idUser-"
                    onclick="tryItOut('GETapi-murroby-uang-saku--idUser-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-uang-saku--idUser-"
                    onclick="cancelTryOut('GETapi-murroby-uang-saku--idUser-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-uang-saku--idUser-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/uang-saku/{idUser}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-uang-saku--idUser-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-uang-saku--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-uang-saku--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idUser</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idUser"                data-endpoint="GETapi-murroby-uang-saku--idUser-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-murroby-saku-masuk--noInduk-">GET api/murroby/saku-masuk/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-saku-masuk--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/saku-masuk/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/saku-masuk/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-saku-masuk--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-saku-masuk--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-saku-masuk--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-saku-masuk--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-saku-masuk--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-saku-masuk--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-saku-masuk--noInduk-" data-method="GET"
      data-path="api/murroby/saku-masuk/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-saku-masuk--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-saku-masuk--noInduk-"
                    onclick="tryItOut('GETapi-murroby-saku-masuk--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-saku-masuk--noInduk-"
                    onclick="cancelTryOut('GETapi-murroby-saku-masuk--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-saku-masuk--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/saku-masuk/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-saku-masuk--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-saku-masuk--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-saku-masuk--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-murroby-saku-masuk--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-murroby-saku-masuk">POST api/murroby/saku-masuk</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-murroby-saku-masuk">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/murroby/saku-masuk" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/saku-masuk"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-murroby-saku-masuk">
</span>
<span id="execution-results-POSTapi-murroby-saku-masuk" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-murroby-saku-masuk"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-murroby-saku-masuk"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-murroby-saku-masuk" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-murroby-saku-masuk">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-murroby-saku-masuk" data-method="POST"
      data-path="api/murroby/saku-masuk"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-murroby-saku-masuk', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-murroby-saku-masuk"
                    onclick="tryItOut('POSTapi-murroby-saku-masuk');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-murroby-saku-masuk"
                    onclick="cancelTryOut('POSTapi-murroby-saku-masuk');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-murroby-saku-masuk"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/murroby/saku-masuk</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-murroby-saku-masuk"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-murroby-saku-masuk"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-murroby-saku-masuk"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-murroby-saku-keluar--noInduk-">GET api/murroby/saku-keluar/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-murroby-saku-keluar--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/murroby/saku-keluar/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/saku-keluar/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-murroby-saku-keluar--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-murroby-saku-keluar--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-murroby-saku-keluar--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-murroby-saku-keluar--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-murroby-saku-keluar--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-murroby-saku-keluar--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-murroby-saku-keluar--noInduk-" data-method="GET"
      data-path="api/murroby/saku-keluar/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-murroby-saku-keluar--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-murroby-saku-keluar--noInduk-"
                    onclick="tryItOut('GETapi-murroby-saku-keluar--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-murroby-saku-keluar--noInduk-"
                    onclick="cancelTryOut('GETapi-murroby-saku-keluar--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-murroby-saku-keluar--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/murroby/saku-keluar/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-murroby-saku-keluar--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-murroby-saku-keluar--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-murroby-saku-keluar--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-murroby-saku-keluar--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-murroby-saku-keluar">POST api/murroby/saku-keluar</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-murroby-saku-keluar">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/murroby/saku-keluar" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/murroby/saku-keluar"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-murroby-saku-keluar">
</span>
<span id="execution-results-POSTapi-murroby-saku-keluar" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-murroby-saku-keluar"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-murroby-saku-keluar"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-murroby-saku-keluar" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-murroby-saku-keluar">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-murroby-saku-keluar" data-method="POST"
      data-path="api/murroby/saku-keluar"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-murroby-saku-keluar', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-murroby-saku-keluar"
                    onclick="tryItOut('POSTapi-murroby-saku-keluar');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-murroby-saku-keluar"
                    onclick="cancelTryOut('POSTapi-murroby-saku-keluar');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-murroby-saku-keluar"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/murroby/saku-keluar</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-murroby-saku-keluar"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-murroby-saku-keluar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-murroby-saku-keluar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-ustad-tahfidz-santri--idUser-">GET api/ustad-tahfidz/santri/{idUser}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-ustad-tahfidz-santri--idUser-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/ustad-tahfidz/santri/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/ustad-tahfidz/santri/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-ustad-tahfidz-santri--idUser-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-ustad-tahfidz-santri--idUser-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-ustad-tahfidz-santri--idUser-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-ustad-tahfidz-santri--idUser-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-ustad-tahfidz-santri--idUser-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-ustad-tahfidz-santri--idUser-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-ustad-tahfidz-santri--idUser-" data-method="GET"
      data-path="api/ustad-tahfidz/santri/{idUser}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-ustad-tahfidz-santri--idUser-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-ustad-tahfidz-santri--idUser-"
                    onclick="tryItOut('GETapi-ustad-tahfidz-santri--idUser-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-ustad-tahfidz-santri--idUser-"
                    onclick="cancelTryOut('GETapi-ustad-tahfidz-santri--idUser-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-ustad-tahfidz-santri--idUser-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/ustad-tahfidz/santri/{idUser}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-ustad-tahfidz-santri--idUser-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-ustad-tahfidz-santri--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-ustad-tahfidz-santri--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idUser</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idUser"                data-endpoint="GETapi-ustad-tahfidz-santri--idUser-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-ustad-tahfidz-tahfidz--idUser-">GET api/ustad-tahfidz/tahfidz/{idUser}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-ustad-tahfidz-tahfidz--idUser-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-ustad-tahfidz-tahfidz--idUser-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-ustad-tahfidz-tahfidz--idUser-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-ustad-tahfidz-tahfidz--idUser-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-ustad-tahfidz-tahfidz--idUser-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-ustad-tahfidz-tahfidz--idUser-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-ustad-tahfidz-tahfidz--idUser-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-ustad-tahfidz-tahfidz--idUser-" data-method="GET"
      data-path="api/ustad-tahfidz/tahfidz/{idUser}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-ustad-tahfidz-tahfidz--idUser-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-ustad-tahfidz-tahfidz--idUser-"
                    onclick="tryItOut('GETapi-ustad-tahfidz-tahfidz--idUser-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-ustad-tahfidz-tahfidz--idUser-"
                    onclick="cancelTryOut('GETapi-ustad-tahfidz-tahfidz--idUser-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-ustad-tahfidz-tahfidz--idUser-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/ustad-tahfidz/tahfidz/{idUser}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-ustad-tahfidz-tahfidz--idUser-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-ustad-tahfidz-tahfidz--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-ustad-tahfidz-tahfidz--idUser-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idUser</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idUser"                data-endpoint="GETapi-ustad-tahfidz-tahfidz--idUser-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-">GET api/ustad-tahfidz/tahfidz/edit/{idDetailTahfidz}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/edit/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/edit/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-" data-method="GET"
      data-path="api/ustad-tahfidz/tahfidz/edit/{idDetailTahfidz}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-"
                    onclick="tryItOut('GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-"
                    onclick="cancelTryOut('GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/ustad-tahfidz/tahfidz/edit/{idDetailTahfidz}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idDetailTahfidz</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idDetailTahfidz"                data-endpoint="GETapi-ustad-tahfidz-tahfidz-edit--idDetailTahfidz-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-">PUT api/ustad-tahfidz/tahfidz/update/{idDetailTahfidz}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/update/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/update/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-">
</span>
<span id="execution-results-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-" data-method="PUT"
      data-path="api/ustad-tahfidz/tahfidz/update/{idDetailTahfidz}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-"
                    onclick="tryItOut('PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-"
                    onclick="cancelTryOut('PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/ustad-tahfidz/tahfidz/update/{idDetailTahfidz}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idDetailTahfidz</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idDetailTahfidz"                data-endpoint="PUTapi-ustad-tahfidz-tahfidz-update--idDetailTahfidz-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-ustad-tahfidz-tahfidz">POST api/ustad-tahfidz/tahfidz</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-ustad-tahfidz-tahfidz">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/ustad-tahfidz/tahfidz" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/ustad-tahfidz/tahfidz"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-ustad-tahfidz-tahfidz">
</span>
<span id="execution-results-POSTapi-ustad-tahfidz-tahfidz" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-ustad-tahfidz-tahfidz"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-ustad-tahfidz-tahfidz"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-ustad-tahfidz-tahfidz" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-ustad-tahfidz-tahfidz">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-ustad-tahfidz-tahfidz" data-method="POST"
      data-path="api/ustad-tahfidz/tahfidz"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-ustad-tahfidz-tahfidz', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-ustad-tahfidz-tahfidz"
                    onclick="tryItOut('POSTapi-ustad-tahfidz-tahfidz');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-ustad-tahfidz-tahfidz"
                    onclick="cancelTryOut('POSTapi-ustad-tahfidz-tahfidz');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-ustad-tahfidz-tahfidz"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/ustad-tahfidz/tahfidz</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-ustad-tahfidz-tahfidz"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-ustad-tahfidz-tahfidz"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-ustad-tahfidz-tahfidz"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-ustad-tahfidz-tahfidz-show--noInduk-">GET api/ustad-tahfidz/tahfidz/show/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-ustad-tahfidz-tahfidz-show--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/show/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/show/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-ustad-tahfidz-tahfidz-show--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-ustad-tahfidz-tahfidz-show--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-ustad-tahfidz-tahfidz-show--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-ustad-tahfidz-tahfidz-show--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-ustad-tahfidz-tahfidz-show--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-ustad-tahfidz-tahfidz-show--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-ustad-tahfidz-tahfidz-show--noInduk-" data-method="GET"
      data-path="api/ustad-tahfidz/tahfidz/show/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-ustad-tahfidz-tahfidz-show--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-ustad-tahfidz-tahfidz-show--noInduk-"
                    onclick="tryItOut('GETapi-ustad-tahfidz-tahfidz-show--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-ustad-tahfidz-tahfidz-show--noInduk-"
                    onclick="cancelTryOut('GETapi-ustad-tahfidz-tahfidz-show--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-ustad-tahfidz-tahfidz-show--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/ustad-tahfidz/tahfidz/show/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-ustad-tahfidz-tahfidz-show--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-ustad-tahfidz-tahfidz-show--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-ustad-tahfidz-tahfidz-show--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-ustad-tahfidz-tahfidz-show--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-">DELETE api/ustad-tahfidz/tahfidz/{idDetailTahfidz}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/ustad-tahfidz/tahfidz/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-">
</span>
<span id="execution-results-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-" data-method="DELETE"
      data-path="api/ustad-tahfidz/tahfidz/{idDetailTahfidz}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-"
                    onclick="tryItOut('DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-"
                    onclick="cancelTryOut('DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/ustad-tahfidz/tahfidz/{idDetailTahfidz}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>idDetailTahfidz</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="idDetailTahfidz"                data-endpoint="DELETEapi-ustad-tahfidz-tahfidz--idDetailTahfidz-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-wali-santri-login">POST api/wali-santri/login</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-wali-santri-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/wali-santri/login" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"noInduk\": \"vmqeopfuudtdsufvyvddq\",
    \"kode\": \"amniihfqcoynlazghdtqt\",
    \"tanggalLahir\": \"qxbajwbpilpmufinllwlo\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/login"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "noInduk": "vmqeopfuudtdsufvyvddq",
    "kode": "amniihfqcoynlazghdtqt",
    "tanggalLahir": "qxbajwbpilpmufinllwlo"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-wali-santri-login">
</span>
<span id="execution-results-POSTapi-wali-santri-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-wali-santri-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-wali-santri-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-wali-santri-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-wali-santri-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-wali-santri-login" data-method="POST"
      data-path="api/wali-santri/login"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-wali-santri-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-wali-santri-login"
                    onclick="tryItOut('POSTapi-wali-santri-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-wali-santri-login"
                    onclick="cancelTryOut('POSTapi-wali-santri-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-wali-santri-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/wali-santri/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-wali-santri-login"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-wali-santri-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-wali-santri-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="POSTapi-wali-santri-login"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kode</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="kode"                data-endpoint="POSTapi-wali-santri-login"
               value="amniihfqcoynlazghdtqt"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>amniihfqcoynlazghdtqt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tanggalLahir</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tanggalLahir"                data-endpoint="POSTapi-wali-santri-login"
               value="qxbajwbpilpmufinllwlo"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>qxbajwbpilpmufinllwlo</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-wali-santri-logout">POST api/wali-santri/logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-wali-santri-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/wali-santri/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-wali-santri-logout">
</span>
<span id="execution-results-POSTapi-wali-santri-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-wali-santri-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-wali-santri-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-wali-santri-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-wali-santri-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-wali-santri-logout" data-method="POST"
      data-path="api/wali-santri/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-wali-santri-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-wali-santri-logout"
                    onclick="tryItOut('POSTapi-wali-santri-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-wali-santri-logout"
                    onclick="cancelTryOut('POSTapi-wali-santri-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-wali-santri-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/wali-santri/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-wali-santri-logout"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-wali-santri-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-wali-santri-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-wali-santri-kesehatan--noInduk-">GET api/wali-santri/kesehatan/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-wali-santri-kesehatan--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/wali-santri/kesehatan/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/kesehatan/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-wali-santri-kesehatan--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-wali-santri-kesehatan--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-wali-santri-kesehatan--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-wali-santri-kesehatan--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-wali-santri-kesehatan--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-wali-santri-kesehatan--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-wali-santri-kesehatan--noInduk-" data-method="GET"
      data-path="api/wali-santri/kesehatan/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-wali-santri-kesehatan--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-wali-santri-kesehatan--noInduk-"
                    onclick="tryItOut('GETapi-wali-santri-kesehatan--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-wali-santri-kesehatan--noInduk-"
                    onclick="cancelTryOut('GETapi-wali-santri-kesehatan--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-wali-santri-kesehatan--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/wali-santri/kesehatan/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-wali-santri-kesehatan--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-wali-santri-kesehatan--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-wali-santri-kesehatan--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-wali-santri-kesehatan--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-wali-santri-ketahfidzan--noInduk-">GET api/wali-santri/ketahfidzan/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-wali-santri-ketahfidzan--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/wali-santri/ketahfidzan/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/ketahfidzan/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-wali-santri-ketahfidzan--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-wali-santri-ketahfidzan--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-wali-santri-ketahfidzan--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-wali-santri-ketahfidzan--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-wali-santri-ketahfidzan--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-wali-santri-ketahfidzan--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-wali-santri-ketahfidzan--noInduk-" data-method="GET"
      data-path="api/wali-santri/ketahfidzan/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-wali-santri-ketahfidzan--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-wali-santri-ketahfidzan--noInduk-"
                    onclick="tryItOut('GETapi-wali-santri-ketahfidzan--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-wali-santri-ketahfidzan--noInduk-"
                    onclick="cancelTryOut('GETapi-wali-santri-ketahfidzan--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-wali-santri-ketahfidzan--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/wali-santri/ketahfidzan/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-wali-santri-ketahfidzan--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-wali-santri-ketahfidzan--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-wali-santri-ketahfidzan--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-wali-santri-ketahfidzan--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-wali-santri-perilaku--noInduk-">GET api/wali-santri/perilaku/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-wali-santri-perilaku--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/wali-santri/perilaku/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/perilaku/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-wali-santri-perilaku--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-wali-santri-perilaku--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-wali-santri-perilaku--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-wali-santri-perilaku--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-wali-santri-perilaku--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-wali-santri-perilaku--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-wali-santri-perilaku--noInduk-" data-method="GET"
      data-path="api/wali-santri/perilaku/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-wali-santri-perilaku--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-wali-santri-perilaku--noInduk-"
                    onclick="tryItOut('GETapi-wali-santri-perilaku--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-wali-santri-perilaku--noInduk-"
                    onclick="cancelTryOut('GETapi-wali-santri-perilaku--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-wali-santri-perilaku--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/wali-santri/perilaku/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-wali-santri-perilaku--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-wali-santri-perilaku--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-wali-santri-perilaku--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-wali-santri-perilaku--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-wali-santri-kelengkapan--noInduk-">GET api/wali-santri/kelengkapan/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-wali-santri-kelengkapan--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/wali-santri/kelengkapan/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/kelengkapan/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-wali-santri-kelengkapan--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-wali-santri-kelengkapan--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-wali-santri-kelengkapan--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-wali-santri-kelengkapan--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-wali-santri-kelengkapan--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-wali-santri-kelengkapan--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-wali-santri-kelengkapan--noInduk-" data-method="GET"
      data-path="api/wali-santri/kelengkapan/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-wali-santri-kelengkapan--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-wali-santri-kelengkapan--noInduk-"
                    onclick="tryItOut('GETapi-wali-santri-kelengkapan--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-wali-santri-kelengkapan--noInduk-"
                    onclick="cancelTryOut('GETapi-wali-santri-kelengkapan--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-wali-santri-kelengkapan--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/wali-santri/kelengkapan/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-wali-santri-kelengkapan--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-wali-santri-kelengkapan--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-wali-santri-kelengkapan--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-wali-santri-kelengkapan--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-wali-santri-lapor-bayar">POST api/wali-santri/lapor-bayar</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-wali-santri-lapor-bayar">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://api-ppatq.test/api/wali-santri/lapor-bayar" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/lapor-bayar"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-wali-santri-lapor-bayar">
</span>
<span id="execution-results-POSTapi-wali-santri-lapor-bayar" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-wali-santri-lapor-bayar"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-wali-santri-lapor-bayar"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-wali-santri-lapor-bayar" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-wali-santri-lapor-bayar">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-wali-santri-lapor-bayar" data-method="POST"
      data-path="api/wali-santri/lapor-bayar"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-wali-santri-lapor-bayar', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-wali-santri-lapor-bayar"
                    onclick="tryItOut('POSTapi-wali-santri-lapor-bayar');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-wali-santri-lapor-bayar"
                    onclick="cancelTryOut('POSTapi-wali-santri-lapor-bayar');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-wali-santri-lapor-bayar"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/wali-santri/lapor-bayar</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-wali-santri-lapor-bayar"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-wali-santri-lapor-bayar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-wali-santri-lapor-bayar"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-wali-santri-riwayat-bayar--noInduk-">GET api/wali-santri/riwayat-bayar/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-wali-santri-riwayat-bayar--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/wali-santri/riwayat-bayar/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/riwayat-bayar/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-wali-santri-riwayat-bayar--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-wali-santri-riwayat-bayar--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-wali-santri-riwayat-bayar--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-wali-santri-riwayat-bayar--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-wali-santri-riwayat-bayar--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-wali-santri-riwayat-bayar--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-wali-santri-riwayat-bayar--noInduk-" data-method="GET"
      data-path="api/wali-santri/riwayat-bayar/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-wali-santri-riwayat-bayar--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-wali-santri-riwayat-bayar--noInduk-"
                    onclick="tryItOut('GETapi-wali-santri-riwayat-bayar--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-wali-santri-riwayat-bayar--noInduk-"
                    onclick="cancelTryOut('GETapi-wali-santri-riwayat-bayar--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-wali-santri-riwayat-bayar--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/wali-santri/riwayat-bayar/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-wali-santri-riwayat-bayar--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-wali-santri-riwayat-bayar--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-wali-santri-riwayat-bayar--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-wali-santri-riwayat-bayar--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-wali-santri-saku-masuk--noInduk-">GET api/wali-santri/saku-masuk/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-wali-santri-saku-masuk--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/wali-santri/saku-masuk/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/saku-masuk/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-wali-santri-saku-masuk--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-wali-santri-saku-masuk--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-wali-santri-saku-masuk--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-wali-santri-saku-masuk--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-wali-santri-saku-masuk--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-wali-santri-saku-masuk--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-wali-santri-saku-masuk--noInduk-" data-method="GET"
      data-path="api/wali-santri/saku-masuk/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-wali-santri-saku-masuk--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-wali-santri-saku-masuk--noInduk-"
                    onclick="tryItOut('GETapi-wali-santri-saku-masuk--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-wali-santri-saku-masuk--noInduk-"
                    onclick="cancelTryOut('GETapi-wali-santri-saku-masuk--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-wali-santri-saku-masuk--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/wali-santri/saku-masuk/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-wali-santri-saku-masuk--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-wali-santri-saku-masuk--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-wali-santri-saku-masuk--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-wali-santri-saku-masuk--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-wali-santri-saku-keluar--noInduk-">GET api/wali-santri/saku-keluar/{noInduk}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-wali-santri-saku-keluar--noInduk-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://api-ppatq.test/api/wali-santri/saku-keluar/consequatur" \
    --header "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://api-ppatq.test/api/wali-santri/saku-keluar/consequatur"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-wali-santri-saku-keluar--noInduk-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, PATCH, DELETE, OPTIONS
access-control-allow-headers: Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-wali-santri-saku-keluar--noInduk-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-wali-santri-saku-keluar--noInduk-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-wali-santri-saku-keluar--noInduk-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-wali-santri-saku-keluar--noInduk-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-wali-santri-saku-keluar--noInduk-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-wali-santri-saku-keluar--noInduk-" data-method="GET"
      data-path="api/wali-santri/saku-keluar/{noInduk}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-wali-santri-saku-keluar--noInduk-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-wali-santri-saku-keluar--noInduk-"
                    onclick="tryItOut('GETapi-wali-santri-saku-keluar--noInduk-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-wali-santri-saku-keluar--noInduk-"
                    onclick="cancelTryOut('GETapi-wali-santri-saku-keluar--noInduk-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-wali-santri-saku-keluar--noInduk-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/wali-santri/saku-keluar/{noInduk}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-wali-santri-saku-keluar--noInduk-"
               value="Bearer {YOUR_AUTH_TOKEN}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_TOKEN}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-wali-santri-saku-keluar--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-wali-santri-saku-keluar--noInduk-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>noInduk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noInduk"                data-endpoint="GETapi-wali-santri-saku-keluar--noInduk-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
