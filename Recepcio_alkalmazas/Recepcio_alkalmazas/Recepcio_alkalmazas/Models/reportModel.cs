using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Configuration;
using System.Text;


namespace Recepcio_alkalmazas.Models
{
    class reportModel
    {
        public int ReportID { get; set; }
        public string GuestName { get; set; }
        public string Email { get; set; }
        public string Problem { get; set; }
        public DateTime Time { get; set; }

        public reportModel(MySqlDataReader reader)
        {
            this.ReportID = Convert.ToInt32(reader["ReportID"]);
            this.GuestName = reader["GuestName"].ToString();
            this.Email = reader["Email"].ToString();
            this.Problem = reader["Problem"].ToString();
            this.Time = Convert.ToDateTime(reader["Time"]);
        }
        public reportModel()
        {  }


        public static ObservableCollection<reportModel> selectReports()
        {
            var lista = new ObservableCollection<reportModel>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT * FROM reports";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new reportModel(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}
