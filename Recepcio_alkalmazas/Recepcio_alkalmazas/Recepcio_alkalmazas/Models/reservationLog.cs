using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;
using System.Collections.ObjectModel;
namespace Recepcio_alkalmazas.Models
{
    class reservationLog
    {
        public int LogID { get; set; }
        public string Name { get; set; }
        public string Status { get; set; }
        public int ReservationID { get; set; }
        public DateTime Time { get; set; }
        public reservationLog(MySqlDataReader reader)
        {
            this.LogID = Convert.ToInt32(reader["LogID"]);
            this.Name = reader["Name"].ToString();
            this.Status = reader["Status"].ToString();
            this.ReservationID = Convert.ToInt32(reader["ReservationID"]);
            this.Time = Convert.ToDateTime(reader["Time"]);
        }
        public static ObservableCollection<reservationLog> selectreservationLog()
        {
            var lista = new ObservableCollection<reservationLog>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "select * from reservationLog order by LogID DESC";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new reservationLog(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}
