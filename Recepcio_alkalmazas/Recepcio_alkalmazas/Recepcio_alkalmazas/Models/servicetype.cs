using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Configuration;
using System.Text;


namespace Recepcio_alkalmazas.Models
{
    public class servicetype:NotifyPropertyChangedBase
    {
        private int _ServiceID;

        public int ServiceID
        {
            get { return _ServiceID; }
            set { _ServiceID = value; onPropertyChanged(); }
        }

        private double _Price;

        public double Price
        {
            get { return _Price; }
            set { _Price = value; onPropertyChanged(); }
        }
        private string _ServiceType;

        public string ServiceType
        {
            get { return _ServiceType; }
            set { _ServiceType = value; onPropertyChanged(); }
        }
        public servicetype(){ }
        public servicetype(MySqlDataReader reader)
        {
            this.ServiceID = Convert.ToInt32(reader["ServiceID"]);
            this.Price = Convert.ToDouble(reader["Price"]);
            this.ServiceType = reader["ServiceType"].ToString();
        }
        public static ObservableCollection<servicetype> selectAllNames()
        {
            var lista = new ObservableCollection<servicetype>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select * from servicetype";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new servicetype(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
        public static ObservableCollection<servicetype> selectIDbyName(string name)
        {
            var lista = new ObservableCollection<servicetype>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select ServiceID from servicetype where ServiceType=@name";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@name", name);

                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new servicetype()
                            {
                                ServiceID = Convert.ToInt32( reader["ServiceID"])
                            }
                                                       );
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
        public static ObservableCollection<servicetype> selectNameByID(int id)
        {
            var lista = new ObservableCollection<servicetype>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select ServiceType from servicetype where ServiceID=@id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);

                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new servicetype()
                            {
                                ServiceType = reader["ServiceType"].ToString()
                            }
                                                       );
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
        public static ObservableCollection<servicetype> selectPrice(int id)
        {
            var lista = new ObservableCollection<servicetype>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select * from servicetype where ServiceID=@id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new servicetype(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }

}
