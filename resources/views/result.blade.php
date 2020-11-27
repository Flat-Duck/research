<html lang="en">

<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: arial, sans-serif;
        }

        .container {}

        .headerSearch {
            z-index: 999;
            display: block;
            position: relative;
            width: 100%;
            height: 64px;
            background-color: #fafafa;
        }

        .logo {
            position: absolute;
            height: 75px;
            top: -2px;
            right: 5px;
            overflow: hidden;
        }

        .right {
            position: absolute;
            height: 75px;
            margin: 20px;
            top: -2px;
            left: 5px;
            overflow: hidden;
        }

        /* .right a {
        padding:0;
        margin-top:30px;
        height:90px;
        } */
        .logo a img {
            padding: 0;
            margin: 0;
            height: 90px;
        }

        .searchForm {
            position: absolute;
            top: 22px;
            right: 150px;
        }

        .searchBar {
            width: 750px;
            height: 40px;
            padding-right: 10px;
            font-family: arial, sans-serif;
            font-size: 16px;
            border: 0px solid #aaa;
            box-shadow: 0px 0px 3px #6a6a6a;
        }

        .searchBar:hover {
            box-shadow: 0px 0px 6px #6a6a6a;
        }

        input {
            outline: none;
        }

        .headerNav {
            display: block;
            position: relative;
            background-color: #fafafa;
            height: 62px;
            border-bottom: 1px solid #ddd;
        }

        .headerNav ul {
            position: absolute;
            right: 125px;
            height: 40px;
            width: 750px;
            padding: 0;
        }

        .headerNav ul li {
            display: inline-block;
            text-decoration: none;
            text-align: center;
            margin-right: 30px;
        }

        .headerNav ul li a {
            color: #555;
            text-decoration: none;
            font-size: 16px;
        }

        .headerNav ul li a:hover {
            color: #333;
        }

        .headerNav ul li:active {
            border-bottom: 3px solid #4d79ff;
            padding-bottom: 20px;
        }

        .headerNav ul li a:active {
            color: #4d79ff;
            font-weight: bold;
        }

        .searchResults {
            display: block;
            width: 700px;
            margin-right: 150px;
        }

        .searchResults ul {
            padding: 0;
            margin: 0;
        }

        .searchResults ul li {
            list-style-type: none;
        }

        .searchResults ul li a {
            text-decoration: none;
        }

        .searchResults ul p {
            margin: 0;
            font-weight: none;
            font-size: 16px;
        }

        ul p span {
            color: #555;
            font-size: 16px;
            font-family: arial, sans-serif;
        }

        .searchResultsItem {
            margin: 35px 0;
        }

        .resultAddr {
            color: #006600;
            font-weight: none;
            font-family: small arial, sans-serif;
            padding: 0;
            margin: 0;
        }

        h4 {
            color: #999;
            font-family: arial, sans-serif;
            margin: 0;
            font-size: 18px;
        }

        .relatedSearchesList {
            column-width: 75px;
            column-count: 2;
            width: 500px;
            height: 120px;
        }

        .relatedSearchesList li {
            display: inline-block;
            padding: 2.5px 0;
        }

        .relatedSearchesList li a {
            text-decoration: none;
            font-family: small arial, sans-serif;
            font-size: 14px;
            color: #000099;
        }

        hr {
            border-top: 1px solid #ddd;
        }

        .pageNumbers ul {
            position: block;
            margin-right: auto;
            margin-left: auto;
            width: 250px;
        }

        .pageNumbers ul li {
            display: inline-block;
            margin-left: 6px;
        }

        .pageNumbers ul li a {
            text-decoration: none;
            color: #4d79ff;
            font-size: 16px;
        }

        .pageNumbers ul li a:hover {
            text-decoration: underline;
        }

        .pageNumbers ul li a:active {
            color: black;
            text-decoration: none;
        }

        .footer {
            position: relative;
            width: 100%;
            bottom: 0;
            background-color: #fafafa;
            margin: 0;
            padding: 0;
            border-top: 1px solid #ddd;
        }

        .location {
            margin-right: 100px;
        }

        .location ul li {
            display: inline-block;
            color: #aaa;
            font-size: 16px;
        }

        .location ul li a {
            color: #777;
            font-size: 16px;
            text-decoration: none;
        }

        .footerNav {
            margin-right: 100px;
        }

        .footerNav ul li {
            display: inline-block;
            margin-left: 20px;
        }

        .footerNav ul li a {
            color: #616161;
            text-decoration: none;
            font-size: 16px;

        }
    </style>
</head>

<body dir="rtl">
    <div class="container">
        <div class="headerSearch">
            <!--Topleft Logo-->
            <div class="logo"><a href="../"><img
                        src="/images/logo.png"></a>
            </div>
            <!--Searchbar-->
            <form class="searchForm" action="/search/results" method="GET" >
            <input class="searchBar" name="term" type="text" value="{{$term}}">
            <select class="searchBar" style="width:200px;" data-trigger="" name="type">
                                        @foreach ($searchTypes as $k=> $type)
                                        {{-- <option placeholder="">Category</option> --}}
                                        <option value="{{$k}}">{{$type}}</option>
                                        @endforeach
                                    </select>

                </datalist>
            </form>
            <div class="right">
                <a href="#">hi</a>
            </div>
        </div>
        <!--Navigation tabs-->
        <div class="headerNav">
            {{-- <ul>
                <li><a href="#">All</a></li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Shopping</a></li>
                <li><a href="#">Maps</a></li>
                <li><a href="#">More</a></li>
                <li><a href="#">Search tools</a></li>
            </ul> --}}
        </div>

        <div class="searchResults">
            <ul>
                @foreach ($papers as $k=>$paper)


                <div class="searchResultsItem">
                <li><a href="#">{{$paper->title}}</a></li>
                <p class="resultAddr">{{$paper->id}}</p>
                <p><span>{{$paper->created_at}} </span>{{$paper->description}}</p>
                </div>

                @endforeach
            </ul>

            {{-- <div class="relatedSearches">
                <h4>Searches related to build this webpage</h4>
                <ul class="relatedSearchesList">
                    <li><a href="#">how to build a website</a></li>
                    <li><a href="#">how to build a webpage for free</a></li>
                    <li><a href="#">build a webpage google</a></li>
                    <li><a href="#">how to build a web page for free</a></li>
                    <li><a href="#"> how to create a webpage</a></li>
                    <li><a href="#">build your own webpage</a></li>
                    <li><a href="#">how to build a webpage from scratch</a></li>
                    <li><a href="#">how to build a webpage using html</a></li>
                </ul>
                <hr>
            </div> --}}
        </div>

        <div class="pageNumbers">
            <ul>
                {{ $papers->links('vendor.pagination.default') }}
            </ul>
        </div>

        <div class="footer">
            <div class="location">
                <ul>
                    <li>YourCity,YourState - From your Internet address - </li>
                    <li><a href="#">Use precise location</a> - </li>
                    <li><a href="#">Learn more</a></li>
                </ul>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms</a></li>
                </ul>
            </div>
        </div>

    </div>
</body>

</html>