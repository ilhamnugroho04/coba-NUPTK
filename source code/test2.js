const express = require('express');
const sql = require('mssql');

const app = express();

const config = {
  user: 'u_ta_adytya',
  password: 'EzgLhm',
  server: '172.16.100.31',
  database: 'ods',
  options: {
    encrypt: true, // Ganti dengan 'true' jika database Anda membutuhkan enkripsi
    trustServerCertificate: true // Ganti dengan 'false' jika sertifikat SSL diperlukan
  }
};

// Global pool connection
let poolPromise;

(async function initPool() {
  try {
    poolPromise = sql.connect(config);
    console.log('Database connection pool initialized.');
  } catch (err) {
    console.error('Error initializing database connection pool:', err.message);
  }
})();

app.get('/', async (req, res) => {
  try {
    const pool = await poolPromise;
    const request = new sql.Request(pool);
    const result = await request.query('SELECT * FROM dbo.ptk');
    res.json(result.recordset);
  } catch (err) {
    console.error('Error:', err.message, err.stack);
    res.status(500).send('Database error: ' + err.message);
  }
});

app.listen(3000, () => {
  console.log('Server is running on port 3000.');
});
