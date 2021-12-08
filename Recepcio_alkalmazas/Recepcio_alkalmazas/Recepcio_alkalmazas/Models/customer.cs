using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Configuration;
using System.Text;

namespace Recepcio_alkalmazas.Models
{
    public class customer:NotifyPropertyChangedBase
    {
        private int _CustomerID;
        public int CustomerID
        {
            get { return _CustomerID; }
            set { _CustomerID = value; onPropertyChanged(); }
        }
        private string _Name;

        public string Name
        {
            get { return _Name; }
            set { _Name = value; onPropertyChanged(); }
        }
        public string PhoneNumber { get; set; }
        public string IDNumber { get; set; }
        public customer(){ }
        public customer(MySqlDataReader reader)
        {
            this.CustomerID = Convert.ToInt32(reader["CustomerID"]);
            this.Name = reader["Name"].ToString();
            this.PhoneNumber = reader["PhoneNumber"].ToString();
            this.IDNumber = reader["IDNumber"].ToString();
        }
        public static ObservableCollection<customer> selectGuestNameByResID(int id)
        {
            var lista = new ObservableCollection<customer>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select customer.Name from customer inner join reservation on customer.CustomerID=reservation.CustomerID where 1=1";
                sql += " AND reservation.ReservationID LIKE @id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            //lista.Add(new customer(reader));
                            lista.Add(new customer()
                            {
                                Name = reader["Name"].ToString()
                            }
                            );
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}
