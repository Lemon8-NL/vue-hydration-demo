<!DOCTYPE html>
<html lang="en">
<head>
    <% base_tag %>
    $MetaTags
    <meta charset="utf-8">
    <meta name="theme-color" content="#008cc9"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <meta name="theme-color" content="#008CC9" />
    <meta http-equiv="Accept-CH" content="DPR, Width">
</head>
<body id="top">

<div id="vueapp">

    <%-- For use with method 1,2,3 in main.js  --%>
    <%-- b-navbar toggleable="md" type="dark" variant="dark">
        <b-navbar-brand href="#">NavBar</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <% loop $Menu(1) %>
                <b-nav-item href="$Link" title="$Title">$MenuTitle</b-nav-item>
                <% end_loop %>
            </b-navbar-nav>

        </b-collapse>
    </b-navbar --%>

    <%-- For use with method 4 in main.js  --%>
    <navbar-component>
        <% loop $Menu(1) %>
        <template slot="links">
            <a href="$Link" title="$Title" class="nav-link">$MenuTitle</a>
        </template>
        <% end_loop %>
    </navbar-component>

    $Layout

</div><!-- //vue-app -->

<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

<footer>
    <div class="bg-dark mt-5 py-5 text-center text-white">
        Copyright &copy; 2019.
    </div>
</footer>

</body>
</html>
