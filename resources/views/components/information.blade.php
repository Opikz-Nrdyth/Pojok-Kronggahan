<div class="container-information">
    <style>
        #panduan {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        #panduan h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        #panduan p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        #panduan ul {
            list-style-type: disc;
            margin: 0;
            padding-left: 20px;
        }

        #panduan ul li {
            margin-bottom: 10px;
            font-size: 16px;
            color: #444;
        }

        #panduan ul li strong {
            color: #222;
        }
    </style>

    <div class="title">
        <h2>Information</h2>
    </div>
    <section id="informasi">
        {!! $website['content'] !!}
    </section>
</div>
