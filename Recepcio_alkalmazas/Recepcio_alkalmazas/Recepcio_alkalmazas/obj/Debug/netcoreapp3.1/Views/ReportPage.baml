   M S B A M L   `   `   `  ����N  JRecepcio_alkalmazas, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullE'clr-namespace:Recepcio_alkalmazas.ViewsRecepcio_alkalmazas.Views  5      *    $Recepcio_alkalmazas.Views.ReportPage   5      W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5      R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5      Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5      @d2http://schemas.microsoft.com/expression/blend/2008     5      9local'clr-namespace:Recepcio_alkalmazas.Views     5        N� Title$  
ReportPage��5	      .��5      �� .+�5   
   �� $��Reports��6   
������$��Center=�6=   $
��Bold"�6Z   $��20(�6l   &   System.Windows.Controls.DataGrid  5   
   -   5        $��
dg_ratings��5         AutoGenerateColumns$ False��6%      
IsReadOnly$
 True��6A   $��5q�6S   
�������$
��Bold"�5         GridLinesVisibility$
 None=�6%      RowBackground �#36393f���#36393f$��Center=�5         SelectionUnit$ FullRow=�60   $��0q�6H      HeadersVisibility$ Column=�6\   $	��397��6w   ��5   q   ��  � 	Resources 5      =  7System.Windows.Controls.Primitives.DataGridColumnHeader �� BasedOn	 �� 
TargetType
 �� Property �� Value��%a   '        7 �� 5      8   "	  6Q   .�5      �� 
 � �� �#35363863   5      5         Columns 5      0  *System.Windows.Controls.DataGridTextColumn  5      ,  &System.Windows.Controls.DataGridColumn   Header$ 
Guest name��6%      Width5  /System.Windows.Controls.DataGridLengthConverter$	 100 6W   1  +System.Windows.Controls.DataGridBoundColumn   Binding 69   �� *	GuestName+6W     5      $ Email address��6%   $	 150 6<    6H   �� *Email+  5      $ Problem��6%   $ * 67    6A   �� *	Problem+   ElementStyle 5      �� 5      "	 ��6    .�5      �� 
 � ��$
 Wrap=�6G   5      5        5      $
 Time��6%   $	 130 63    6?   �� *Time+ �� StringFormat$ yyyy.MM.dd. hh:mm:ss��5!      5"      5#      