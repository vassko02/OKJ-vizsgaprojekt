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
        public string Email { get; set; }
        public string Address { get; set; }
        public string Level { get; set; }
        public int ReservationNumber { get; set; }


        public customer(){ }
        public customer(MySqlDataReader reader)
        {
            this.CustomerID = Convert.ToInt32(reader["CustomerID"]);
            this.Name = reader["Name"].ToString();
            this.PhoneNumber = reader["PhoneNumber"].ToString();
            this.Email = reader["Email"].ToString();
            this.Address = reader["Address"].ToString();
            this.Level= reader["LEVEL"].ToString();
            this.ReservationNumber = Convert.ToInt32(reader["ReservationNumber"]);

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
        public static ObservableCollection<customer> selectGuestsByEmail(string email)
        {
            var lista = new ObservableCollection<customer>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select customer.Name from customer Where customer.Email LIKE @email";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@email", email);
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
        public static ObservableCollection<customer> selectGuestNames()
        {
            var lista = new ObservableCollection<customer>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select * from customer";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new customer(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
        public static int insert(customer model)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "INSERT INTO customer (Name,PhoneNumber,Email) VALUES " +
                    "(@Name,@PhoneNumber,@Email)";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@Name", model.Name);
                    cmd.Parameters.AddWithValue("@PhoneNumber", model.PhoneNumber);
                    cmd.Parameters.AddWithValue("@Email", model.Email);
                    cmd.Parameters.AddWithValue("@Address", model.Address);
                    cmd.ExecuteNonQuery();
                    return (int)cmd.LastInsertedId;
                }
            }
        }
        public static ObservableCollection<customer> selectGuestByNAme(string name)
        {
            var lista = new ObservableCollection<customer>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select * from customer Where customer.Name LIKE @name";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@name", name);
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new customer(reader));                            
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
        public static void updateResNumber(int id,int mennyire,string level)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "UPDATE customer SET ReservationNumber=@mennyire, LEVEL=@level WHERE CustomerID=@id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    cmd.Parameters.AddWithValue("@mennyire", mennyire);
                    cmd.Parameters.AddWithValue("@level", level);
                    cmd.ExecuteNonQuery();
                }
                con.Close();
            }
        }
    }
}
