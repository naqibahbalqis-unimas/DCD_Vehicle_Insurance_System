const { onRequest } = require("firebase-functions/v2/https");
const logger = require("firebase-functions/logger");

const functions = require("firebase-functions");
const { createProxyMiddleware } = require("http-proxy-middleware");
const express = require("express");

const app = express();

// Proxy requests to the PHP server
app.use(
  "/",
  createProxyMiddleware({
    target: "http://localhost:8000",
    changeOrigin: true,
  })
);

exports.proxyPHP = functions.https.onRequest(app);
