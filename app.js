const http = require("http");
const fs = require("fs");

const server = http.createServer((req, res) => {
  if (req.method == "GET" && req.url == "/") {
    res.writeHead(200, { "Content-Type": "text/html" });
    // fs.createReadStream("./views/pages/index").pipe(res);
    fs.readFile("./views/pages/index.html", (err, data) => {
      if (err) throw err;
      //   console.log(data);
      res.write(data);
    });
  }
});

server.listen(8080);
