using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Configuration;
using System.Text;


namespace Recepcio_alkalmazas.Models
{
    public class cashregister
    {
        public int CashRegisterID { get; set; }
        public string GuestName { get; set; }
        public double Amount { get; set; }
        public string  Title { get; set; }
        public double Paid { get; set; }
        public double Changee { get; set; }
        public cashregister(){}
        public cashregister(MySqlDataReader reader)
        {
            this.CashRegisterID = Convert.ToInt32(reader["CashRegisterID"]);
            this.GuestName = reader["GuestName"].ToString();
            this.Amount = Convert.ToDouble(reader["Amount"]);
            this.Title = reader["Title"].ToString();
            this.Paid = Convert.ToDouble(reader["Paid"]);
            this.Changee = Convert.ToDouble(reader["Changee"]);
        }
        public cashregister(string n,double a,string t,double p,double c)
        {
            this.GuestName = n;
            this.Amount = a;
            this.Title = t;
            this.Paid = p;
            this.Changee = c;
        }
        public static int insert(cashregister model)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "INSERT INTO cashregister (GuestName,Amount,Title,Paid,Changee) VALUES " +
                    "(@GuestName,@Amount,@Title,@Paid,@Changee)";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@GuestName", model.GuestName);
                    cmd.Parameters.AddWithValue("@Amount", model.Amount);
                    cmd.Parameters.AddWithValue("@Title", model.Title);
                    cmd.Parameters.AddWithValue("@Paid", model.Paid);
                    cmd.Parameters.AddWithValue("@Changee", model.Changee);
                    cmd.ExecuteNonQuery();
                    return (int)cmd.LastInsertedId;
                }
            }
        }
        public static ObservableCollection<cashregister> select( )
        {
            var lista = new ObservableCollection<cashregister>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "select * from cashregister ORDER BY `cashregister`.`CashRegisterID` DESC";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new cashregister(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}
