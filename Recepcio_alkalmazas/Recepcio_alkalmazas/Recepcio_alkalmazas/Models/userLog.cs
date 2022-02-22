using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;
using System.Collections.ObjectModel;

namespace Recepcio_alkalmazas.Models
{
    class userLog
    {
        public int LogID { get; set; }
        public string Name { get; set; }
        public string Status { get; set; }
        public int UserID { get; set; }
        public DateTime Time { get; set; }
        public userLog(MySqlDataReader reader)
        {
            this.LogID = Convert.ToInt32(reader["LogID"]);
            this.Name = reader["Name"].ToString();
            this.Status = reader["Status"].ToString();
            this.UserID = Convert.ToInt32(reader["UserID"]);
            this.Time = Convert.ToDateTime(reader["Time"]);
        }
        public static ObservableCollection<userLog> selectuserlog()
        {
            var lista = new ObservableCollection<userLog>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "select * from userLog order by LogID DESC";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new userLog(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}
