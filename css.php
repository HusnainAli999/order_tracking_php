<style>
    .product_position_handler_div {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
    }

    .product_inner_cover_div {
        width: 500px;
        height: 200px;
        background: white;
        color: black;
        padding: 20px;
        box-shadow: 10px 10px 30px gray;
        margin-top: 30px;
    }

    .product_inner_cover_div p {
        padding: 10px 5px 0px 5px;
    }

    .product_inner_cover_div a {
        background: green;
        color: white;
        cursor: pointer;
        text-decoration: none;
        outline: none;
        padding: 10px;
        width: 200px;
        border-radius: 3px;
    }

    #product_insert_form {
        width: 500px;
        height: 500px;
        background: white;
        box-shadow: 10px 10px 30px gray;
        color: black;
        padding: 20px;
        border-radius: 4px;
        position: relative;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    #product_insert_form label {
        display: inline-block;
        padding: 0px 5px 10px 0px;
    }

    #product_insert_form input {
        width: 200px;
        padding: 10px;
        border: 1px solid black;
        box-shadow: 5px 5px 30px gray;
        color: black;
        margin-bottom: 10px;
    }

    .alert_h1 {
        background: black;
        color: white;
        padding: 20px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-radius: 5px;
        cursor: pointer;
        z-index: 9999;
    }

    #orders_table {
        width: 100%;
        padding: 20px;
        background: white;
        color: black;
        border: 1px solid #000;
    }

    #orders_table th {
        padding: 10px;
        border: 1px solid #000;
    }

    #orders_table td {
        padding: 10px;
        border: 1px solid #000;
    }

    .top_h1 {
        background: black;
        color: white;
        padding: 20px;
        text-align: center;
    }

    .redirect_a {
        background: black;
        color: white;
        padding: 10px;
        text-decoration: none;
        margin-left: 10px;
        border-radius: 5px;
        font-size: 20px;
    }

    .fa-bell {
        position: absolute;
        left: 90%;
        font-size: 20px;
        top: 20px;
        cursor: pointer;
    }

    .fa-bell:hover {
        color: red;
    }

    .order_tracking_form_div {
        background: black;
        color: white;
        padding: 10px;
        width: 200px;
        height: 200px;
        border-radius: 3px;
        position: absolute;
        left: 80%;
        top: -100%;
        opacity: 0;
        transition: all 0.3s;
    }

    .order_tracking_form_div form input::placeholder {
        color: white;
    }

    .order_tracking_form_div form input {
        padding: 10px;
        border: none;
        outline: none;
        background: darkred;
        color: white;
    }

    .order_tracking_form_div form button {
        padding: 10px;
        width: 150px;
        color: white;
        background: gray;
        border: none;
        outline: none;
        cursor: pointer;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        margin-top: 20px;
        transition: all 0.3s;
    }

    .order_tracking_form_div form button:hover {
        background: white;
        color: black;
    }

    #update_order_status_form {
        width: 400px;
        height: 200px;
        padding: 20px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-radius: 5px;
        background: white;
        color: black;
        display: flex;
        justify-content: space-evenly;
        flex-direction: column;
        box-shadow: 10px 10px 30px gray;
    }

    #update_order_status_form label {
        display: inline-block;
        padding: 10px 5px 20px 0px;
    }

    #update_order_status_form input {
        width: 200px;
        background: black;
        color: white;
        padding: 10px;
        border:none;
        outline: none;
    }

    #update_order_status_form input::placeholder {
        color: white;
    }

    #update_order_status_form button {
        width: 200px;
        border:none;
        color: white;
        cursor: pointer;
        outline: none;
        background: green;
        padding: 10px;
    }
</style>