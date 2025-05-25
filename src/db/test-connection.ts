import { Pool } from 'pg';

const pool = new Pool({
  host: '127.0.0.1',
  port: 5432,
  database: 'tesisatmarket',
  user: 'postgres',
  password: 'Gazi.boran1671'
});

async function testConnection() {
  try {
    const client = await pool.connect();
    console.log('Veritabanına başarıyla bağlanıldı!');
    client.release();
  } catch (error) {
    console.error('Veritabanına bağlanırken hata oluştu:', error);
  } finally {
    await pool.end();
  }
}

testConnection(); 