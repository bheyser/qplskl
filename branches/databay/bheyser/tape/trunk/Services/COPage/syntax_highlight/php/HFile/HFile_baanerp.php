<?php
$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_baanerp extends HFile{
   function HFile_baanerp(){
     $this->HFile();	
/*************************************/
// Beautifier Highlighting Configuration File 
// BaanERP 3/4-GL
/*************************************/
// Flags

$this->nocase            	= "1";
$this->notrim            	= "0";
$this->perl              	= "0";

// Colours

$this->colours        	= array("blue", "purple", "gray", "brown", "blue", "purple");
$this->quotecolour       	= "blue";
$this->blockcommentcolour	= "green";
$this->linecommentcolour 	= "green";

// Indent Strings

$this->indent            	= array("{", "if", "else", "repeat", "selectdo", "selectempty", "selecteos", "while", "for", "case", "dllusage");
$this->unindent          	= array("}", "endif", "endselect", "endwhile", "endfor", "endcase", "until", "enddllusage");

// String characters and delimiters

$this->stringchars       	= array("\"");
$this->delimiters        	= array("~", "!", "@", "%", "^", "&", "*", "(", ")", "-", "+", "=", "|", "\\", "/", "{", "}", "[", "]", ";", "\"", "'", "<", ">", " ", ",", "	", "?");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array("|");
$this->blockcommenton    	= array("dllusage");
$this->blockcommentoff   	= array("endusage");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			"at" => "1", 
			"and" => "1", 
			"as" => "1", 
			"auto" => "1", 
			"base" => "1", 
			"based" => "1", 
			"break" => "1", 
			"bset" => "1", 
			"by" => "1", 
			"call" => "1", 
			"case" => "1", 
			"char" => "1", 
			"clean" => "1", 
			"commit" => "1", 
			"common" => "1", 
			"const" => "1", 
			"continue" => "1", 
			"default" => "1", 
			"dim" => "1", 
			"do" => "1", 
			"domain" => "1", 
			"double" => "1", 
			"else" => "1", 
			"empty" => "1", 
			"end" => "1", 
			"endcase" => "1", 
			"endfor" => "1", 
			"endif" => "1", 
			"endwhile" => "1", 
			"endselect" => "1", 
			"enum" => "1", 
			"eq" => "1", 
			"extern" => "1", 
			"false" => "1", 
			"fixed" => "1", 
			"for" => "1", 
			"from" => "1", 
			"function" => "1", 
			"ge" => "1", 
			"global" => "1", 
			"goto" => "1", 
			"gt" => "1", 
			"group" => "1", 
			"if" => "1", 
			"in" => "1", 
			"input" => "1", 
			"inrange" => "1", 
			"le" => "1", 
			"long" => "1", 
			"lt" => "1", 
			"mb" => "1", 
			"mess" => "1", 
			"multibyte" => "1", 
			"ne" => "1", 
			"not" => "1", 
			"on" => "1", 
			"or" => "1", 
			"order" => "1", 
			"print" => "1", 
			"prompt" => "1", 
			"prepared" => "1", 
			"ref" => "1", 
			"reference" => "1", 
			"register" => "1", 
			"repeat" => "1", 
			"return" => "1", 
			"rows" => "1", 
			"select" => "1", 
			"selectbind" => "1", 
			"selectdo" => "1", 
			"selectempty" => "1", 
			"selecteos" => "1", 
			"selecterror" => "1", 
			"set" => "1", 
			"static" => "1", 
			"step" => "1", 
			"stop" => "1", 
			"string" => "1", 
			"switch" => "1", 
			"table" => "1", 
			"then" => "1", 
			"to" => "1", 
			"transaction" => "1", 
			"true" => "1", 
			"typedef" => "1", 
			"union" => "1", 
			"unsigned" => "1", 
			"until" => "1", 
			"update" => "1", 
			"void" => "1", 
			"where" => "1", 
			"wherebind" => "1", 
			"whereused" => "1", 
			"while" => "1", 
			"with" => "1", 
			"#define" => "1", 
			"#include" => "1", 
			"#elif" => "1", 
			"#if" => "1", 
			"#line" => "1", 
			"#else" => "1", 
			"#ifdef" => "1", 
			"#pragma" => "1", 
			"#endif" => "1", 
			"#ifndef" => "1", 
			"#undef" => "1", 
			"#ident" => "1", 
			"db.update" => "2", 
			"db.insert" => "2", 
			"db.delete" => "2", 
			"db.retry.point" => "2", 
			"commit.transaction" => "2", 
			"abort.transaction" => "2", 
			"AbstractMethodError" => "3", 
			"AccessException" => "3", 
			"Acl" => "3", 
			"AclEntry" => "3", 
			"AclNotFoundException" => "3", 
			"ActionEvent" => "3", 
			"ActionListener" => "3", 
			"Adjustable" => "3", 
			"AdjustmentEvent" => "3", 
			"AdjustmentListener" => "3", 
			"Adler32" => "3", 
			"AlreadyBoundException" => "3", 
			"Applet" => "3", 
			"AppletContext" => "3", 
			"AppletStub" => "3", 
			"AreaAveragingScaleFilter" => "3", 
			"ArithmeticException" => "3", 
			"Array" => "3", 
			"ArrayIndexOutOfBoundsException" => "3", 
			"ArrayStoreException" => "3", 
			"AudioClip" => "3", 
			"AWTError" => "3", 
			"AWTEvent" => "3", 
			"AWTEventMulticaster" => "3", 
			"AWTException" => "3", 
			"BeanDescriptor" => "3", 
			"BeanInfo" => "3", 
			"Beans" => "3", 
			"BigDecimal" => "3", 
			"BigInteger" => "3", 
			"BindException" => "3", 
			"BitSet" => "3", 
			"Boolean" => "3", 
			"BorderLayout" => "3", 
			"BreakIterator" => "3", 
			"BufferedInputStream" => "3", 
			"BufferedOutputStream" => "3", 
			"BufferedReader" => "3", 
			"BufferedWriter" => "3", 
			"Button" => "3", 
			"ButtonPeer" => "3", 
			"Byte" => "3", 
			"ByteArrayInputStream" => "3", 
			"ByteArrayOutputStream" => "3", 
			"Calendar" => "3", 
			"CallableStatement" => "3", 
			"CanvasCanvasPeer" => "3", 
			"Certificate" => "3", 
			"Character" => "3", 
			"CharacterIterator" => "3", 
			"CharArrayReader" => "3", 
			"CharArrayWriter" => "3", 
			"CharConversionException" => "3", 
			"Checkbox" => "3", 
			"CheckboxGroup" => "3", 
			"CheckboxMenuItem" => "3", 
			"CheckboxMenuItemPeer" => "3", 
			"CheckboxPeer" => "3", 
			"CheckedInputStream" => "3", 
			"CheckedOutputStream" => "3", 
			"Checksum" => "3", 
			"Choice" => "3", 
			"ChoiceFormat" => "3", 
			"ChoicePeer" => "3", 
			"Class" => "3", 
			"ClassCastException" => "3", 
			"ClassCircularityError" => "3", 
			"ClassFormatError" => "3", 
			"ClassLoader" => "3", 
			"ClassNotFoundException" => "3", 
			"Clipboard" => "3", 
			"ClipboardOwner" => "3", 
			"Cloneable" => "3", 
			"CloneNotSupportedException" => "3", 
			"CollationElementIterator" => "3", 
			"CollationKey" => "3", 
			"Collator" => "3", 
			"Color" => "3", 
			"ColorModel" => "3", 
			"Compiler" => "3", 
			"Component" => "3", 
			"ComponentAdapter" => "3", 
			"ComponentEvent" => "3", 
			"ComponentListener" => "3", 
			"ComponentPeer" => "3", 
			"ConnectException" => "3", 
			"ConnectIOException" => "3", 
			"Connection" => "3", 
			"Constructor" => "3", 
			"Container" => "3", 
			"ContainerAdapter" => "3", 
			"ContainerEvent" => "3", 
			"ContainerListener" => "3", 
			"ContainerPeer" => "3", 
			"ContentHandler" => "3", 
			"ContentHandlerFactory" => "3", 
			"CRC32" => "3", 
			"CropImageFilter" => "3", 
			"Cursor" => "3", 
			"Customizer" => "3", 
			"CardLayout" => "3", 
			"DatabaseMetaData" => "3", 
			"DataFlavor" => "3", 
			"DataFormatException" => "3", 
			"DatagramPacket" => "3", 
			"DatagramSocket" => "3", 
			"DatagramSocketImpl" => "3", 
			"DataInput" => "3", 
			"DataInputStream" => "3", 
			"DataOutput" => "3", 
			"DataOutputStream" => "3", 
			"DataTruncation" => "3", 
			"Date" => "3", 
			"DateFormat" => "3", 
			"DateFormatSymbols" => "3", 
			"DecimalFormat" => "3", 
			"DecimalFormatSymbols" => "3", 
			"Deflater" => "3", 
			"DeflaterOutputStream" => "3", 
			"DGC" => "3", 
			"Dialog" => "3", 
			"DialogPeer" => "3", 
			"Dictionary" => "3", 
			"DigestException" => "3", 
			"DigestInputStream" => "3", 
			"DigestOutputStream" => "3", 
			"Dimension" => "3", 
			"DirectColorModel" => "3", 
			"Driver" => "3", 
			"DriverManager" => "3", 
			"DriverPropertyInfo" => "3", 
			"DSAKey" => "3", 
			"DSAKeyPairGenerator" => "3", 
			"DSAParams" => "3", 
			"DSAPrivateKey" => "3", 
			"DSAPublicKey" => "3", 
			"EmptyStackException" => "3", 
			"Enumeration" => "3", 
			"EOFException" => "3", 
			"Error" => "3", 
			"Event" => "3", 
			"EventListener" => "3", 
			"EventObject" => "3", 
			"EventQueue" => "3", 
			"EventSetDescriptor" => "3", 
			"Exception" => "3", 
			"ExceptionInInitializerError" => "3", 
			"ExportException" => "3", 
			"FeatureDescriptor" => "3", 
			"Field" => "3", 
			"FieldPosition" => "3", 
			"File" => "3", 
			"FileDescriptor" => "3", 
			"FileDialog" => "3", 
			"FileDialogPeer" => "3", 
			"FileInputStream" => "3", 
			"FilenameFilter" => "3", 
			"FileNameMap" => "3", 
			"FileNotFoundException" => "3", 
			"FileOutputStream" => "3", 
			"FileReader" => "3", 
			"FileWriter" => "3", 
			"FilteredImageSource" => "3", 
			"FilterInputStream" => "3", 
			"FilterOutputStream" => "3", 
			"FilterReader" => "3", 
			"FilterWriter" => "3", 
			"Float" => "3", 
			"FlowLayout" => "3", 
			"FocusAdapter" => "3", 
			"FocusEvent" => "3", 
			"FocusListener" => "3", 
			"Font" => "3", 
			"FontMetrics" => "3", 
			"FontPeer" => "3", 
			"Format" => "3", 
			"Frame" => "3", 
			"FramePeer" => "3", 
			"Graphics" => "3", 
			"GregorianCalendar" => "3", 
			"GridBagConstraints" => "3", 
			"GridBagLayout" => "3", 
			"GridLayout" => "3", 
			"GZIPInputStream" => "3", 
			"GZIPOutputStream" => "3", 
			"Hashtable" => "3", 
			"HttpURLConnection" => "3", 
			"Identity" => "3", 
			"IdentityScope" => "3", 
			"IllegalAccessError" => "3", 
			"IllegalAccessException" => "3", 
			"IllegalArgumentException" => "3", 
			"IllegalComponentStateException" => "3", 
			"IllegalMonitorStateException" => "3", 
			"IllegalStateException" => "3", 
			"IllegalThreadStateException" => "3", 
			"Image" => "3", 
			"ImageConsumer" => "3", 
			"ImageFilter" => "3", 
			"ImageObserver" => "3", 
			"ImageProducer" => "3", 
			"IncompatibleClassChangeError" => "3", 
			"IndexColorModel" => "3", 
			"IndexedPropertyDescriptor" => "3", 
			"IndexOutOfBoundsException" => "3", 
			"InetAddress" => "3", 
			"Inflater" => "3", 
			"InflaterInputStream" => "3", 
			"InputEvent" => "3", 
			"InputStream" => "3", 
			"InputStreamReader" => "3", 
			"Insets" => "3", 
			"InstantiationError" => "3", 
			"InstantiationException" => "3", 
			"Integer" => "3", 
			"InternalError" => "3", 
			"InterruptedException" => "3", 
			"InterruptedIOException" => "3", 
			"IntrospectionException" => "3", 
			"Introspector" => "3", 
			"InvalidClassException" => "3", 
			"InvalidKeyException" => "3", 
			"InvalidObjectException" => "3", 
			"InvalidParameterException" => "3", 
			"InvocationTargetException" => "3", 
			"IOException" => "3", 
			"ItemEvent" => "3", 
			"ItemListener" => "3", 
			"ItemSelectable" => "3", 
			"Key" => "3", 
			"KeyAdapter" => "3", 
			"KeyEvent" => "3", 
			"KeyException" => "3", 
			"KeyListener" => "3", 
			"KeyManagementException" => "3", 
			"KeyPair" => "3", 
			"KeyPairGenerator" => "3", 
			"Label" => "3", 
			"LabelPeer" => "3", 
			"LastOwnerException" => "3", 
			"LayoutManager" => "3", 
			"LayoutManager2" => "3", 
			"Lease" => "3", 
			"LightweightPeer" => "3", 
			"LineNumberInputStream" => "3", 
			"LineNumberReader" => "3", 
			"LinkageError" => "3", 
			"List" => "3", 
			"ListPeer" => "3", 
			"ListResourceBundle" => "3", 
			"LoaderHandler" => "3", 
			"Locale" => "3", 
			"LocateRegistry" => "3", 
			"LogStream" => "3", 
			"MalformedURLException" => "3", 
			"MarshalException" => "3", 
			"Math" => "3", 
			"MediaTracker" => "3", 
			"Member" => "3", 
			"MemoryImageSource" => "3", 
			"Menu" => "3", 
			"MenuBar" => "3", 
			"MenuBarPeer" => "3", 
			"MenuComponent" => "3", 
			"MenuComponentPeer" => "3", 
			"MenuContainer" => "3", 
			"MenuItem" => "3", 
			"MenuItemPeer" => "3", 
			"MenuPeer" => "3", 
			"MenuShortcut" => "3", 
			"MessageDigest" => "3", 
			"MessageFormat" => "3", 
			"Method" => "3", 
			"MethodDescriptor" => "3", 
			"MissingResourceException" => "3", 
			"Modifier" => "3", 
			"MouseAdapter" => "3", 
			"MouseEvent" => "3", 
			"MouseListener" => "3", 
			"MouseMotionAdapter" => "3", 
			"MouseMotionListener" => "3", 
			"MulticastSocket" => "3", 
			"Naming" => "3", 
			"NegativeArraySizeException" => "3", 
			"NoClassDefFoundError" => "3", 
			"NoRouteToHostException" => "3", 
			"NoSuchAlgorithmException" => "3", 
			"NoSuchElementException" => "3", 
			"NoSuchFieldError" => "3", 
			"NoSuchFieldException" => "3", 
			"NoSuchMethodError" => "3", 
			"NoSuchMethodException" => "3", 
			"NoSuchObjectException" => "3", 
			"NoSuchProviderException" => "3", 
			"NotActiveException" => "3", 
			"NotBoundException" => "3", 
			"NotOwnerException" => "3", 
			"NotSerializableException" => "3", 
			"NullPointerException" => "3", 
			"Number" => "3", 
			"NumberFormat" => "3", 
			"NumberFormatException" => "3", 
			"Object" => "3", 
			"ObjectInput" => "3", 
			"ObjectInputStream" => "3", 
			"ObjectInputValidation" => "3", 
			"ObjectOutput" => "3", 
			"ObjectOutputStream" => "3", 
			"ObjectStreamClass" => "3", 
			"ObjectStreamException" => "3", 
			"ObjID" => "3", 
			"Observable" => "3", 
			"Observer" => "3", 
			"Operation" => "3", 
			"OptionalDataException" => "3", 
			"OutOfMemoryError" => "3", 
			"OutputStream" => "3", 
			"OutputStreamWriter" => "3", 
			"Owner" => "3", 
			"PaintEvent" => "3", 
			"Panel" => "3", 
			"PanelPeer" => "3", 
			"ParameterDescriptor" => "3", 
			"ParseException" => "3", 
			"ParsePosition" => "3", 
			"Permission" => "3", 
			"PipedInputStream" => "3", 
			"PipedOutputStream" => "3", 
			"PipedReader" => "3", 
			"PipedWriter" => "3", 
			"PixelGrabber" => "3", 
			"Point" => "3", 
			"Polygon" => "3", 
			"PopupMenu" => "3", 
			"PopupMenuPeer" => "3", 
			"PreparedStatement" => "3", 
			"Principal" => "3", 
			"PrintGraphics" => "3", 
			"PrintJob" => "3", 
			"PrintStream" => "3", 
			"PrintWriter" => "3", 
			"PrivateKey" => "3", 
			"Process" => "3", 
			"Properties" => "3", 
			"PropertyChangeEvent" => "3", 
			"PropertyChangeListener" => "3", 
			"PropertyChangeSupport" => "3", 
			"PropertyDescriptor" => "3", 
			"PropertyEditor" => "3", 
			"PropertyEditorManager" => "3", 
			"PropertyEditorSupport" => "3", 
			"PropertyResourceBundle" => "3", 
			"PropertyVetoException" => "3", 
			"ProtocolException" => "3", 
			"Provider" => "3", 
			"ProviderException" => "3", 
			"PublicKey" => "3", 
			"PushbackInputStream" => "3", 
			"PushbackReader" => "3", 
			"Random" => "3", 
			"RandomAccessFile" => "3", 
			"Reader" => "3", 
			"RectangleRegistry" => "3", 
			"RegistryHandler" => "3", 
			"Remote" => "3", 
			"RemoteCall" => "3", 
			"RemoteException" => "3", 
			"RemoteObject" => "3", 
			"RemoteRef" => "3", 
			"RemoteServer" => "3", 
			"RemoteStub" => "3", 
			"ReplicateScaleFilter" => "3", 
			"ResourceBundle" => "3", 
			"ResultSet" => "3", 
			"ResultSetMetaData" => "3", 
			"RGBImageFilter" => "3", 
			"RMIClassLoader" => "3", 
			"RMIFailureHandler" => "3", 
			"RMISecurityException" => "3", 
			"RMISecurityManager" => "3", 
			"RMISocketFactory" => "3", 
			"RuleBasedCollator" => "3", 
			"Runnable" => "3", 
			"Runtime" => "3", 
			"RuntimeException" => "3", 
			"Scrollbar" => "3", 
			"ScrollbarPeer" => "3", 
			"ScrollPane" => "3", 
			"ScrollPanePeer" => "3", 
			"SecureRandom" => "3", 
			"Security" => "3", 
			"SecurityException" => "3", 
			"SecurityManager" => "3", 
			"SequenceInputStream" => "3", 
			"Serializable" => "3", 
			"ServerCloneException" => "3", 
			"ServerError" => "3", 
			"ServerException" => "3", 
			"ServerNotActiveException" => "3", 
			"ServerRef" => "3", 
			"ServerRuntimeException" => "3", 
			"ServerSocket" => "3", 
			"Shape" => "3", 
			"Short" => "3", 
			"Signature" => "3", 
			"SignatureException" => "3", 
			"Signer" => "3", 
			"SimpleBeanInfo" => "3", 
			"SimpleDateFormat" => "3", 
			"SimpleTimeZone" => "3", 
			"Skeleton" => "3", 
			"SkeletonMismatchException" => "3", 
			"SkeletonNotFoundException" => "3", 
			"Socket" => "3", 
			"SocketException" => "3", 
			"SocketImpl" => "3", 
			"SocketImplFactory" => "3", 
			"SocketSecurityException" => "3", 
			"SQLException" => "3", 
			"SQLWarning" => "3", 
			"Stack" => "3", 
			"StackOverflowError" => "3", 
			"Statement" => "3", 
			"StreamCorruptedException" => "3", 
			"StreamTokenizer" => "3", 
			"StringBuffer" => "3", 
			"StringBufferInputStream" => "3", 
			"StringCharacterIterator" => "3", 
			"StringIndexOutOfBoundsException" => "3", 
			"StringReader" => "3", 
			"StringSelection" => "3", 
			"StringTokenizer" => "3", 
			"StringWriter" => "3", 
			"StubNotFoundException" => "3", 
			"SyncFailedException" => "3", 
			"System" => "3", 
			"SystemColor" => "3", 
			"TextArea" => "3", 
			"TextAreaPeer" => "3", 
			"TextComponent" => "3", 
			"TextComponentPeer" => "3", 
			"TextEvent" => "3", 
			"TextField" => "3", 
			"TextFieldPeer" => "3", 
			"TextListener" => "3", 
			"Thread" => "3", 
			"ThreadDeath" => "3", 
			"ThreadGroup" => "3", 
			"Throwable" => "3", 
			"Time" => "3", 
			"Timestamp" => "3", 
			"TimeZone" => "3", 
			"Toolkit" => "3", 
			"TooManyListenersException" => "3", 
			"Transferable" => "3", 
			"Types" => "3", 
			"UID" => "3", 
			"UnexpectedException" => "3", 
			"UnicastRemoteObject" => "3", 
			"UnknownError" => "3", 
			"UnknownHostException" => "3", 
			"UnknownServiceException" => "3", 
			"UnmarshalException" => "3", 
			"Unreferenced" => "3", 
			"UnsatisfiedLinkError" => "3", 
			"UnsupportedEncodingException" => "3", 
			"UnsupportedFlavorException" => "3", 
			"URL" => "3", 
			"URLConnection" => "3", 
			"URLEncoder" => "3", 
			"URLStreamHandler" => "3", 
			"URLStreamHandlerFactory" => "3", 
			"UTFDataFormatException" => "3", 
			"Vector" => "3", 
			"VerifyError" => "3", 
			"VetoableChangeListener" => "3", 
			"VetoableChangeSupport" => "3", 
			"VirtualMachineError" => "3", 
			"Visibility" => "3", 
			"VMID" => "3", 
			"Window" => "3", 
			"WindowAdapter" => "3", 
			"WindowEvent" => "3", 
			"WindowListener" => "3", 
			"WindowPeer" => "3", 
			"WriteAbortedException" => "3", 
			"Writer" => "3", 
			"ZipEntry" => "3", 
			"ZipException" => "3", 
			"ZipFile" => "3", 
			"ZipInputStream" => "3", 
			"ZipOutputStream" => "3", 
			"after.choice:" => "4", 
			"after.delete:" => "4", 
			"after.display:" => "4", 
			"after.field:" => "4", 
			"after.form:" => "4", 
			"after.input:" => "4", 
			"after.program:" => "4", 
			"after.read:" => "4", 
			"after.rewrite:" => "4", 
			"after.skip.delete:" => "4", 
			"after.skip.rewrite:" => "4", 
			"after.skip.write:" => "4", 
			"after.update.db.commit:" => "4", 
			"after.write:" => "4", 
			"after.zoom:" => "4", 
			"before.checks:" => "4", 
			"before.choice:" => "4", 
			"before.delete:" => "4", 
			"before.display:" => "4", 
			"before.field:" => "4", 
			"before.form:" => "4", 
			"before.input:" => "4", 
			"before.program:" => "4", 
			"before.read:" => "4", 
			"before.rewrite:" => "4", 
			"before.write:" => "4", 
			"before.zoom:" => "4", 
			"check.input:" => "4", 
			"choice.abort.program:" => "4", 
			"choice.add.set:" => "4", 
			"choice.bms:" => "4", 
			"choice.change.frm:" => "4", 
			"choice.change.order:" => "4", 
			"choice.cont.process:" => "4", 
			"choice.create.job:" => "4", 
			"choice.def.find:" => "4", 
			"choice.dupl.occur:" => "4", 
			"choice.end.program:" => "4", 
			"choice.find.data:" => "4", 
			"choice.first.frm:" => "4", 
			"choice.first.set:" => "4", 
			"choice.first.view:" => "4", 
			"choice.get.defaults:" => "4", 
			"choice.global.copy:" => "4", 
			"choice.global.delete:" => "4", 
			"choice.interrupt:" => "4", 
			"choice.last.frm:" => "4", 
			"choice.last.set:" => "4", 
			"choice.last.view:" => "4", 
			"choice.make.resident:" => "4", 
			"choice.mark.delete:" => "4", 
			"choice.mark.occur:" => "4", 
			"choice.modify.set:" => "4", 
			"choice.next.frm:" => "4", 
			"choice.next.halfset:" => "4", 
			"choice.next.set:" => "4", 
			"choice.prev.frm:" => "4", 
			"choice.prev.halfset:" => "4", 
			"choice.prev.set:" => "4", 
			"choice.prev.view:" => "4", 
			"choice.print.data:" => "4", 
			"choice.recover.set:" => "4", 
			"choice.resize.frm:" => "4", 
			"choice.restart.input:" => "4", 
			"choice.run.job:" => "4", 
			"choice.save.defaults:" => "4", 
			"choice.start.chart:" => "4", 
			"choice.start.query:" => "4", 
			"choice.start.set:" => "4", 
			"choice.text.manager:" => "4", 
			"choice.update.db:" => "4", 
			"choice.user.0:" => "4", 
			"choice.user.1:" => "4", 
			"choice.user.2:" => "4", 
			"choice.user.3:" => "4", 
			"choice.user.4:" => "4", 
			"choice.user.5:" => "4", 
			"choice.user.6:" => "4", 
			"choice.user.7:" => "4", 
			"choice.user.8:" => "4", 
			"choice.user.9:" => "4", 
			"choice.zoom:" => "4", 
			"declaration:" => "4", 
			"domain.error:" => "4", 
			"field.all:" => "4", 
			"field.other:" => "4", 
			"form.10:" => "4", 
			"form.11:" => "4", 
			"form.12:" => "4", 
			"form.1:" => "4", 
			"form.2:" => "4", 
			"form.3:" => "4", 
			"form.4:" => "4", 
			"form.5:" => "4", 
			"form.6:" => "4", 
			"form.7:" => "4", 
			"form.8:" => "4", 
			"form.9:" => "4", 
			"form.all:" => "4", 
			"form.other:" => "4", 
			"functions:" => "4", 
			"init.field:" => "4", 
			"init.form:" => "4", 
			"main.table.io:" => "4", 
			"on.choice:" => "4", 
			"on.entry:" => "4", 
			"on.error:" => "4", 
			"on.exit:" => "4", 
			"on.input:" => "4", 
			"read.view:" => "4", 
			"ref.display:" => "4", 
			"ref.input:" => "4", 
			"when.field.changes:" => "4", 
			"zoom.from.all:" => "4", 
			"zoom.from.other:" => "4", 
			"bms.send" => "5", 
			"bms.receive" => "5", 
			"bms.add.mask" => "5", 
			"bms.receive$" => "5", 
			"brw.parse.message" => "5", 
			"brw.message.type" => "5", 
			"brw.message.argument" => "5", 
			"brw.message.content" => "5", 
			"brw.start.init" => "5", 
			"brw.end.init" => "5", 
			"brw.mess" => "5", 
			"brw.mouse.normal" => "5", 
			"brw.mouse.watch" => "5", 
			"brw.display" => "5", 
			"browser.send" => "5", 
			"evt.bms.sender" => "5", 
			"dal.start.business.method" => "6", 
			"dal.new" => "6", 
			"dal.update" => "6", 
			"dal.destroy" => "6", 
			"dal.set.error.message" => "6", 
			"DALHOOKERROR" => "6");

// Special extensions

// Each category can specify a PHP function that returns an altered
// version of the keyword.
        
        

$this->linkscripts    	= array(
			"1" => "donothing", 
			"2" => "donothing", 
			"3" => "donothing", 
			"4" => "donothing", 
			"5" => "donothing", 
			"6" => "donothing");
}


function donothing($keywordin)
{
	return $keywordin;
}

}?>
