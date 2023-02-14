const sql = require("mysql");

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "S@m22",
});

con.connect(function (err) {
  if (err) throw err;
  console.log("Connected!");
});
