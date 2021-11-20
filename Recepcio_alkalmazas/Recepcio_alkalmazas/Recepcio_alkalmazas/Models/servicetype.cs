using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;


namespace Recepcio_alkalmazas.Models
{
    public class servicetype
    {
        public int ServiceID { get; set; }
        public double Price { get; set; }
        public string ServiceType { get; set; }
        public servicetype(){ }
        public servicetype(MySqlDataReader reader)
        {

        }
    }
}
