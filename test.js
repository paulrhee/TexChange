function emptyStr(given_str) {
    if (given_str = "") {
        return "N/A";
    }
    else {
        return given_str;
    }
}

var name = [], email = [], phone = [], condition = [], price = [];

// set up connection with sql
var mysql = require('mysql');
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "mydb"
});

// type in query
var query = "select `name`, email, phone, `condition`, price from buy right join (select * from listing where listing_id = 1) as listing on book_sold_id = listing_id left join user on seller_id = user_id";

con.connect();

con.query(query, function(err, obj) {
    // convert to json
    var arrObjStr = JSON.stringify(obj);
    var arrObj = eval(arrObjStr);
    // for each object in json
    for (var i = 0; i < arrObj.length; i ++) {

        // parse to table
        name.push(arrObj[i].name);
        email.push(arrObj[i].email);
        phone.push(arrObj[i].phone);
        condition.push(arrObj[i].condition);
        price.push(arrObj[i].price);
    }
    for (var i = 0; i < name.length; i ++) {
        console.log(name[i]);
        console.log(email[i])
        console.log(phone[i])
        console.log(price[i]);
        console.log(condition[i]);
    }
});


con.end();