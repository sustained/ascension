const { spawn } = require("child_process");

spawn("npm", ["run", "watch"], { stdio: "inherit" });
