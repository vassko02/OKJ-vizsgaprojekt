#pragma checksum "..\..\..\..\pages\fogyasztas.xaml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "0A5725D9CF66F5057274FA60C207A88101CD89B7"
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.42000
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

using Recepcio_alkalmazas.pages;
using System;
using System.Diagnostics;
using System.Windows;
using System.Windows.Automation;
using System.Windows.Controls;
using System.Windows.Controls.Primitives;
using System.Windows.Controls.Ribbon;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Ink;
using System.Windows.Input;
using System.Windows.Markup;
using System.Windows.Media;
using System.Windows.Media.Animation;
using System.Windows.Media.Effects;
using System.Windows.Media.Imaging;
using System.Windows.Media.Media3D;
using System.Windows.Media.TextFormatting;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Windows.Shell;


namespace Recepcio_alkalmazas.pages {
    
    
    /// <summary>
    /// fogyasztas
    /// </summary>
    public partial class fogyasztas : System.Windows.Controls.Page, System.Windows.Markup.IComponentConnector {
        
        
        #line 17 "..\..\..\..\pages\fogyasztas.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox tb_guestinput;
        
        #line default
        #line hidden
        
        
        #line 19 "..\..\..\..\pages\fogyasztas.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ListBox lb_guests;
        
        #line default
        #line hidden
        
        
        #line 22 "..\..\..\..\pages\fogyasztas.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ListBox lb_fogyasztasok;
        
        #line default
        #line hidden
        
        
        #line 32 "..\..\..\..\pages\fogyasztas.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_eltavolit;
        
        #line default
        #line hidden
        
        
        #line 39 "..\..\..\..\pages\fogyasztas.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Label lbl_osszeg;
        
        #line default
        #line hidden
        
        
        #line 43 "..\..\..\..\pages\fogyasztas.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ScrollViewer sv_italok;
        
        #line default
        #line hidden
        
        private bool _contentLoaded;
        
        /// <summary>
        /// InitializeComponent
        /// </summary>
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "5.0.10.0")]
        public void InitializeComponent() {
            if (_contentLoaded) {
                return;
            }
            _contentLoaded = true;
            System.Uri resourceLocater = new System.Uri("/Recepcio_alkalmazas;component/pages/fogyasztas.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\..\..\pages\fogyasztas.xaml"
            System.Windows.Application.LoadComponent(this, resourceLocater);
            
            #line default
            #line hidden
        }
        
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "5.0.10.0")]
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Never)]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Design", "CA1033:InterfaceMethodsShouldBeCallableByChildTypes")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Maintainability", "CA1502:AvoidExcessiveComplexity")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1800:DoNotCastUnnecessarily")]
        void System.Windows.Markup.IComponentConnector.Connect(int connectionId, object target) {
            switch (connectionId)
            {
            case 1:
            this.tb_guestinput = ((System.Windows.Controls.TextBox)(target));
            
            #line 18 "..\..\..\..\pages\fogyasztas.xaml"
            this.tb_guestinput.TextChanged += new System.Windows.Controls.TextChangedEventHandler(this.tb_guestinput_TextChanged);
            
            #line default
            #line hidden
            return;
            case 2:
            this.lb_guests = ((System.Windows.Controls.ListBox)(target));
            
            #line 20 "..\..\..\..\pages\fogyasztas.xaml"
            this.lb_guests.SelectionChanged += new System.Windows.Controls.SelectionChangedEventHandler(this.lb_guests_SelectionChanged);
            
            #line default
            #line hidden
            return;
            case 3:
            this.lb_fogyasztasok = ((System.Windows.Controls.ListBox)(target));
            return;
            case 4:
            this.btn_eltavolit = ((System.Windows.Controls.Button)(target));
            
            #line 32 "..\..\..\..\pages\fogyasztas.xaml"
            this.btn_eltavolit.Click += new System.Windows.RoutedEventHandler(this.btn_eltavolit_Click);
            
            #line default
            #line hidden
            return;
            case 5:
            this.lbl_osszeg = ((System.Windows.Controls.Label)(target));
            return;
            case 6:
            this.sv_italok = ((System.Windows.Controls.ScrollViewer)(target));
            return;
            case 7:
            
            #line 64 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 8:
            
            #line 69 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 9:
            
            #line 74 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 10:
            
            #line 80 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 11:
            
            #line 85 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 12:
            
            #line 90 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 13:
            
            #line 96 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 14:
            
            #line 101 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 15:
            
            #line 106 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 16:
            
            #line 111 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 17:
            
            #line 116 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 18:
            
            #line 121 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 19:
            
            #line 126 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 20:
            
            #line 131 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 21:
            
            #line 136 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 22:
            
            #line 144 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 23:
            
            #line 148 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 24:
            
            #line 152 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 25:
            
            #line 156 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 26:
            
            #line 160 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            case 27:
            
            #line 164 "..\..\..\..\pages\fogyasztas.xaml"
            ((System.Windows.Controls.StackPanel)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.StackPanel_MouseUp);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}

