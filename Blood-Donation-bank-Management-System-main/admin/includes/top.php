<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .news-container {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    font-family: "Roboto", sans-serif;
    box-shadow: 0 4px 8px -4px rgba(0, 0, 0, 0.3);
}

.news-container .title {
    position: absolute;
    background: #df2020;
    height: 100%;
    display: flex;
    align-items: center;
    padding: 0 24px;
    color: white;
    font-weight: bold;
    z-index: 200;
}

.news-container ul {
    display: flex;
    list-style: none;
    margin: 0;
    animation: scroll 25s infinite linear;
}

.news-container ul li {
    white-space: nowrap;
    padding: 10px 24px;
    color: #494949;
    position: relative;
}

.news-container ul li::after {
    content:"";
    width: 1px;
    height: 100%;
    background: #b8b8b8;
    position: absolute;
    top: 0;
    right: 0;
}

.news-container ul li:last-child::after {
    display: none;
}

@keyframes scroll {
    from {
        transform: translateX(100%);
    }

    to {
        transform: translateX(-1083px);

    }
}
</style>
<body>
<div class="news-container">
        <div class="title">
            Breaking News
        </div>

        <ul>
            <li>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam!
            </li>
            
            <li>
                Lorem ipsum dolor sit
            </li>

            <li>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam!
            </li>
        </ul>
    </div>
</body>
</html>