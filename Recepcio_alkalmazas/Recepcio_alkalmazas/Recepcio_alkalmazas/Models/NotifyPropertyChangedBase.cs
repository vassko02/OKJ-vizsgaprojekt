using System;
using System.Collections.Generic;
using System.Text;

using System.ComponentModel;
using System.Runtime.CompilerServices;

namespace Recepcio_alkalmazas
{
    public class NotifyPropertyChangedBase : INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;

        protected void onPropertyChanged([CallerMemberName] string tulajdonsagNev = "")
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(tulajdonsagNev));
        }
    }
}
