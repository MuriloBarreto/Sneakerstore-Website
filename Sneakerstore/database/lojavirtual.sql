-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jul-2021 às 02:58
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojavirtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id_adm` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id_adm`, `nome`, `email`, `senha`) VALUES
(1, 'murilo barreto', 'barreto_11almeida@hotmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `id_anuncio` int(11) NOT NULL,
  `imagem` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `ativo_anuncio` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id_anuncio`, `imagem`, `url`, `ativo_anuncio`) VALUES
(1, 'anu.gif', 'produto/&p=8', 'S'),
(2, 'anuncio.gif', 'produto/&p=8', 'S'),
(3, 'a2.gif', 'produto/&p=8', 'S'),
(4, 'a.gif', 'produto/&p=8', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `imagem` varchar(150) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id_banner`, `titulo`, `imagem`, `url`, `ativo`) VALUES
(1, 'teste', 'b2.gif', 'produto/&p=8', 'S'),
(2, 'teste 2', 'b1.jpg', 'produto/&p=9', 'S'),
(3, 'teste 3', 'ba5.gif', 'produto/&p=8', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `qtde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_pedido`, `id_produto`, `valor`, `qtde`) VALUES
(13, 9, 8, '169.99', 1),
(19, 15, 9, '5000.00', 1),
(20, 16, 9, '5000.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `ativo_categoria` varchar(1) NOT NULL,
  `icone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `ativo_categoria`, `icone`) VALUES
(5, 'Corrida', 'S', 'fast.png'),
(6, 'Casual', 'S', 'casual.png'),
(7, 'Academia', 'S', 'peso.png'),
(8, 'Futebol', 'S', 'chuteira.png'),
(9, 'Basquete', 'S', 'basquete.png'),
(11, 'Masculino', 'S', 'masculino.png'),
(12, 'Feminino', 'S', 'feminino.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cliente` varchar(200) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL,
  `bairro` varchar(150) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `ativo_cliente` varchar(1) NOT NULL,
  `fone` varchar(30) DEFAULT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cliente`, `endereco`, `cidade`, `bairro`, `uf`, `cep`, `email`, `senha`, `ativo_cliente`, `fone`, `data_cadastro`) VALUES
(1, 'Murilo Barreto Almeida', 'rua serra', 'são paulo', 'vila', 'sp', '11233222', 'barreto_11almeida@hotmail.com', '', 'S', '22222222', '2021-01-27'),
(2, 'lucas', 'rr', 'rrrr', 'rrrrrr', 'sp', '1111111', 'lucas@gmail.com', '111', 'S', '2222222', '2020-05-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante`
--

CREATE TABLE `fabricante` (
  `id_fabricante` int(11) NOT NULL,
  `fabricante` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fabricante`
--

INSERT INTO `fabricante` (`id_fabricante`, `fabricante`) VALUES
(1, 'Nike'),
(3, 'Adidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id_item` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor_item` decimal(10,2) NOT NULL,
  `qtde_item` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id_item`, `id_venda`, `id_produto`, `valor_item`, `qtde_item`, `subtotal`) VALUES
(1, 3, 6, '5000.00', 1, '5000.00'),
(2, 4, 6, '5000.00', 1, '5000.00'),
(3, 5, 5, '5000.00', 1, '5000.00'),
(4, 6, 8, '169.99', 1, '169.99'),
(5, 7, 8, '169.99', 1, '169.99'),
(6, 8, 8, '169.99', 1, '169.99'),
(7, 9, 9, '5000.00', 1, '5000.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_cliente`, `data_pedido`) VALUES
(1, 0, '2020-05-03'),
(2, 0, '2020-05-03'),
(5, 1, '2020-05-05'),
(6, 0, '2020-05-05'),
(7, 0, '2020-05-06'),
(8, 0, '2020-05-06'),
(9, 0, '2020-05-06'),
(13, 1, '2020-05-21'),
(14, 1, '2020-05-21'),
(15, 1, '2020-05-21'),
(16, 0, '2020-05-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `id_fabricante` int(11) NOT NULL,
  `produto` varchar(220) NOT NULL,
  `preco_alto` decimal(10,2) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `detalhes` text DEFAULT NULL,
  `ativo_produto` varchar(1) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `destaque` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_categoria`, `id_subcategoria`, `id_fabricante`, `produto`, `preco_alto`, `preco`, `descricao`, `detalhes`, `ativo_produto`, `imagem`, `destaque`) VALUES
(8, 5, 9, 1, 'Tênis Nike Downshifter 9 - Masculino', '249.99', '169.99', '<p>TECNOLOGIA(S) NA ENTRESSOLA</p>\r\n\r\n<p><strong>Phylon:&nbsp;</strong>Material De Espuma Comprimido Para Oferecer Amortecimento Leve.</p>', '<p style=\"text-align:center\"><strong>Conhe&ccedil;a o&nbsp;T&ecirc;nis Nike Downshifter 9 &ndash; Masculino!<br />\r\n<br />\r\n<br />\r\nO aliado perfeito para os&nbsp;treinos leves de corrida&nbsp;e&nbsp;atividades fitness, o&nbsp;T&ecirc;nis Nike Downshifter 9&nbsp;apresenta cabedal (parte superior do t&ecirc;nis) respir&aacute;vel em mesh (fibras em tramas abertas) com entressola otimizada pela&nbsp;espuma Phylon&nbsp;que oferece uma incr&iacute;vel sensa&ccedil;&atilde;o de maciez e suavidade para leve e&nbsp;duradouro amortecimento. J&aacute; o solado do&nbsp;Nike Downshifter 9 Masculino&nbsp;&eacute; em borracha para&nbsp;durabilidade&nbsp;e&nbsp;ader&ecirc;ncia&nbsp;nas superf&iacute;cies. J&aacute; o &quot;swoosh&quot; estampando as laterais do&nbsp;t&ecirc;nis esportivo&nbsp;confere a&nbsp;qualidade Nike&nbsp;em todos os detalhes. N&atilde;o perca a chance, aproveite o pre&ccedil;o e compre j&aacute; o seu!</strong></p>', 'S', 'tenis1.jpg', 'S'),
(9, 5, 8, 1, 'teste', '1000.00', '5000.00', '<p>teste</p>', '<p>teste</p>', 'S', 'Tênis Cano Alto Everlast Jump III.png', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id_subcategoria` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `subcategoria` varchar(150) NOT NULL,
  `ativo_subcategoria` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `subcategoria`
--

INSERT INTO `subcategoria` (`id_subcategoria`, `id_categoria`, `subcategoria`, `ativo_subcategoria`) VALUES
(8, 5, 'Nike', 'S'),
(9, 5, 'Adidas', 'S'),
(10, 6, 'New Balance', 'S'),
(11, 6, 'Nike', 'S'),
(12, 7, 'Olympikus', 'S'),
(13, 8, 'Nike', 'S'),
(14, 9, 'Nike', 'S'),
(15, 11, 'Nike', 'S'),
(16, 11, 'Adidas', 'S'),
(17, 6, 'All Star', 'S'),
(18, 12, 'Nike', 'S'),
(19, 12, 'All Star', 'S'),
(20, 12, 'Adidas', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `pago` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_cliente`, `data_venda`, `pago`) VALUES
(1, 1, '2020-05-04', 'N'),
(2, 1, '2020-05-04', 'N'),
(3, 1, '2020-05-04', 'N'),
(4, 1, '2020-05-04', 'N'),
(5, 1, '2020-05-04', 'N'),
(6, 1, '2020-05-08', 'N'),
(7, 1, '2020-05-08', 'N'),
(9, 1, '2020-05-22', 'N');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices para tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`id_anuncio`);

--
-- Índices para tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id_fabricante`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id_subcategoria`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id_fabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
